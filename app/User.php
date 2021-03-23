<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'avatar', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline() {
        $follows = $this->follows->pluck('id');

        return Tweet::whereIn('user_id', $follows)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(50);
    }

    public function tweets() {
        return $this->hasMany(Tweet::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function getAvatarAttribute($avatar) {
        return $avatar ? asset($avatar) : "https://avatars.dicebear.com/api/human/$this->id.svg?width=128&height=128&background=%231CA1F2";
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    public function path($append = '') {
        $path = route('profile', $this);

        return $append ? "{$path}/{$append}" : $path;
    }
}
