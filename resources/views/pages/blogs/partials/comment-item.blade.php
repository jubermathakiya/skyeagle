<div class="{{ $isReply ?? false ? 'ms-md-5 mt-3' : 'my-3' }}">
    <div class="border border-light rounded p-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                @if($comment->author_image_url)
                    <img src="{{ $comment->author_image_url }}" alt="{{ $comment->author_name }}"
                        class="img-fluid rounded-circle avatar avatar-md me-2">
                @else
                    <span class="avatar avatar-md rounded-circle me-2 d-inline-flex align-items-center justify-content-center text-white fw-semibold"
                        style="background-color: {{ reviewer_avatar_color($comment->author_name) }};">
                        {{ reviewer_initials($comment->author_name) }}
                    </span>
                @endif
                <div>
                    <h6>{{ $comment->author_name }}</h6>
                    <span class="fs-14 fw-normal text-gray-6">{{ $comment->created_at?->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        <div class="flex-grow-1">
            <p class="fs-14 text-gray-6 mb-0">{{ $comment->message }}</p>
        </div>
    </div>

    @foreach($comment->replies as $reply)
        @include('pages.blogs.partials.comment-item', ['comment' => $reply, 'isReply' => true])
    @endforeach
</div>
