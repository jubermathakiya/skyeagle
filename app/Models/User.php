<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'role_id',
        'email_verified_at',
        'provider',
        'provider_id',
        'avatar',
        'name_prompt_completed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role_id' => 'integer',
            'name_prompt_completed' => 'boolean',
        ];
    }

    public function needsNamePrompt(): bool
    {
        if ($this->name_prompt_completed) {
            return false;
        }

        $first = trim((string) $this->first_name);

        if ($first === '') {
            return true;
        }

        return strcasecmp($first, 'User') === 0;
    }

    public function hasAdminRole(): bool
    {
        return (int) ($this->role_id ?? 0) === (int) config('roles.ids.admin', 1);
    }

    public function hasCustomerRole(): bool
    {
        return (int) ($this->role_id ?? 0) === (int) config('roles.ids.user', 2);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn() => trim("{$this->first_name} {$this->last_name}")
        );
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function userAddress()
    {
        return $this->hasOne(UserAddress::class);
    }

}
