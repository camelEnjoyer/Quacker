<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Quack;

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

    // Quacks creados por el usuario
    public function quacks()
    {
        return $this->hasMany(Quack::class);
    }

    // Quacks a los que ha dado like (quavs)
    public function quavs()
    {
        return $this->belongsToMany(
            Quack::class,
            'quavs'
        );
    }

    // Quacks que ha requackeado
    public function requacks()
    {
        return $this->belongsToMany(
            Quack::class,
            'requacks'
        );
    }

    // Usuarios a los que sigue
    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follower_id',
            'followed_id'
        );
    }

    // Usuarios que le siguen
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'followed_id',
            'follower_id'
        );
    }

    // Popularidad: total de quavers (likes) de todos sus quacks
    public function getPopularidadAttribute()
    {
        $total = 0;
        foreach ($this->quacks as $quack) {
            $total += $quack->quavers()->count();
        }
        return $total;
    }

    // Viralidad: total de requacks de todos sus quacks
    public function getViralidadAttribute()
    {
        $total = 0;
        foreach ($this->quacks as $quack) {
            $total += $quack->requackers()->count();
        }
        return $total;
    }
}
