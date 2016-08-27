<?php

namespace App\Models;

use App\User;
use GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class BlogEntry extends Model
{
    use Searchable, ActivityTrait;

    protected $fillable = [
        'title', 'slug', 'user_id', 'excerpt', 'body'
    ];

    public static function findBySlug($slug)
    {
    	return self::where('slug', $slug)->first();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
     * getstream.io Stuff
     */

    public function activityActorMethodName()
    {
        return 'author';
    }

    public function activityVerb()
    {
        return 'Article';
    }
}
