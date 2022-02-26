<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follow',);
    }

    /**
     * Users that are following "current_user".
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow', 'followee', 'follower');
    }

    /**
     * Users that "current_user" is following.
     */
    public function follow()
    {
        return $this->belongsToMany(User::class, 'follow', 'follower', 'followee');
    }
}
