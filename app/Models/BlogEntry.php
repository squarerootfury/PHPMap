<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class BlogEntry extends Model
{
    use Searchable;

    protected $fillable = [
        'title', 'slug', 'user_id', 'excerpt', 'body'
    ];

    public static function findBySlug($slug)
    {
    	return self::where('slug', $slug)->first();
    }
}
