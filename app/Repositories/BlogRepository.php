<?php

namespace App\Repositories;

use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogRepository extends BaseRepository
{
    public function __construct(BlogPost $model)
    {
        parent::__construct($model);
    }

    public function getBlogs(Request $request, int $perPage = 9)
    {
        $search = trim((string) $request->query('search', ''));

        return BlogPost::query()
            ->with([
                'category',
                'images',
                'tags' => fn ($query) => $query->active()->orderBy('name'),
            ])
            ->active()
            ->when($search !== '', function ($query) use ($search) {
                $like = '%' . addcslashes($search, '%_\\') . '%';

                $query->where(function ($query) use ($like) {
                    $query->where('title', 'like', $like)
                        ->orWhere('excerpt', 'like', $like)
                        ->orWhere('content', 'like', $like);
                });
            })
            ->latest('published_at')
            ->latest('id')
            ->paginate($perPage)
            ->appends($request->only('search'));
    }

    public function getBlogDetails(string $slug): BlogPost
    {
        $blog = BlogPost::query()
            ->with([
                'category',
                'images',
                'tags' => fn ($query) => $query->active()->orderBy('name'),
            ])
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        $blog->increment('views_count');
        $blog->refresh()->load([
            'category',
            'images',
            'tags' => fn ($query) => $query->active()->orderBy('name'),
        ]);

        return $blog;
    }

    public function getRelatedPosts(BlogPost $blog, int $limit = 3)
    {
        $tagIds = $blog->tags->pluck('id')->all();

        return BlogPost::query()
            ->with([
                'category',
                'images',
                'tags' => fn ($query) => $query->active()->orderBy('name'),
            ])
            ->active()
            ->where('blog_posts.id', '!=', $blog->id)
            ->when(!empty($tagIds), function ($query) use ($tagIds) {
                $query->whereHas('tags', function ($query) use ($tagIds) {
                    $query->whereIn('blog_tags.id', $tagIds);
                });
            })
            ->latest('published_at')
            ->latest('id')
            ->limit($limit)
            ->get();
    }

    public function getPopularTags(int $limit = 5)
    {
        return BlogTag::query()
            ->select('blog_tags.*', DB::raw('COUNT(blog_post_tag.blog_post_id) as posts_count'))
            ->join('blog_post_tag', 'blog_post_tag.blog_tag_id', '=', 'blog_tags.id')
            ->join('blog_posts', 'blog_posts.id', '=', 'blog_post_tag.blog_post_id')
            ->active()
            ->whereRaw('LOWER(blog_posts.status) = ?', ['active'])
            ->where(function ($query) {
                $query->whereNull('blog_posts.published_at')
                    ->orWhere('blog_posts.published_at', '<=', now());
            })
            ->groupBy('blog_tags.id', 'blog_tags.name', 'blog_tags.slug', 'blog_tags.status', 'blog_tags.created_at', 'blog_tags.updated_at')
            ->orderByDesc('posts_count')
            ->orderBy('blog_tags.name')
            ->limit($limit)
            ->get();
    }
}
