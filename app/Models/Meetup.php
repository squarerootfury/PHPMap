<?php

namespace app\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Meetup extends Model
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'location', 'address', 'lat', 'lng', 'website', 'user_id', 'city', 'country', 'from_date', 'to_date', 'published', 'description',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function host()
    {
        return $this->belongsTo(User::class);
    }

    public function attendees()
    {
        return $this->hasMany(User::class, 'meetup_user');
    }
}
