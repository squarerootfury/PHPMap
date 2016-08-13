<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogEntry extends Model
{
    public static function findBySlug($slug)
    {
    	return self::where('slug', $slug)->first();
    }
}
