<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'noticia_id',
        'user_id',
        'type',
    ];
}
