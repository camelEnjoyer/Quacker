<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Quack;
use App\Models\Quav;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'nickname',
        'email',
        'password',
        'bio'
    ];

    public function quacks()
    {
        return $this->hasMany(Quack::class);
    }

    public function quavs()
    {
        return $this->hasMany(Quav::class);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, "follows", "follower_id", "followed_id");
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function requacks()
    {
        return $this->hasMany(Requack::class);
    }

}
