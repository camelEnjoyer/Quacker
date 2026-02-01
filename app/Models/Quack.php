<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quack extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contenido'
    ];

    // Autor del quack
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hashtags del quack (N:N)
    public function quashtags()
    {
        return $this->belongsToMany(Quashtag::class);
    }

    // Usuarios que han dado like (quavs)
    // Usuarios que han dado like (quavs)
    public function quavers()
    {
        return $this->belongsToMany(
            User::class,
            'quavs'
        );
    }


    // Usuarios que han requackeado
    public function requackers()
    {
        return $this->belongsToMany(
            User::class,
            'requacks'
        );
    }
}
