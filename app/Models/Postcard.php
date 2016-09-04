<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postcard extends Model
{
    protected $fillable = [
        'user_id', 'username', 'city', 'country', 'path'
    ];
}
