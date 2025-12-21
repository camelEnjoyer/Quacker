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
        'user_nickname',
        'contenido'
    ];

    public function quashtag(){
        return $this->belongsTo(Quashtag::class);
    }
}
