<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Comment;
use App\Models\CommentLike;

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
        'phone', 
        'avatar', 
        'birthday', 
        'male',
        'device_token'
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

    public function products()
    {
        return $this->hasMany(Product::class , 'users_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class , 'users_id', 'id');
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class , 'users_id', 'id');
    }
}
