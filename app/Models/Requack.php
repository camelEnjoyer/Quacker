<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Requack extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function quack(){
        return $this->belongsTo(Quack::class);
    }
}
