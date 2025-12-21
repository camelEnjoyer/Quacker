<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pcntl\QosClass;

class Quack extends Model
{
    /** @use HasFactory<\Database\Factories\QuackFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contenido'
    ];

    public function quashtag(){
        return $this->belongsTo(Quashtag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function quavs(){
        return $this->hasMany(Quav::class);
    }

    public function requacks(){
        return $this->hasMany(Requack::class);
    }

}
