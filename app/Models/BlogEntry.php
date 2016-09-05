<?php

namespace app\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class BlogEntry extends Model
{
    use Searchable;

    protected $fillable = [
        'title', 'slug', 'user_id', 'excerpt', 'body',
    ];

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
