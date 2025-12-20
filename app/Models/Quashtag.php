<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quashtag extends Model
{
    /** @use HasFactory<\Database\Factories\QuashtagsFactory> */
    use HasFactory;
    protected $fillable = ['name'];
}
