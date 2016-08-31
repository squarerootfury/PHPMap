<?php

namespace App;

use App\Models\Meetup;
use App\Models\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

use App\Models\BlogEntry;
use App\Models\UserPost;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'avatar', 'profile_cover', 'email', 'github_id', 'slack_webhook_url', 'password', 'is_admin', 'lat', 'lng', 'address', 'city', 'country', 'company', 'intro', 'website', 'github_url', 'twitter_url', 'facebook_url', 'linkedin_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'slack_webhook_url', 'github_id'
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function routeNotificationForSlack()
    {
        return $this->slack_webhook_url;
    }

    public static function findByUsername($username)
    {
        return self::where('username', $username)->first();
    }

    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public static function findByCity($city)
    {
        return self::where('city', $city)->get();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'notifiable_id');
    }
    
    public function blog_entries()
    {
        return $this->hasMany(BlogEntry::class);
    }

    public function posts()
    {
        return $this->hasMany(UserPost::class);
    }

    public function favorite_articles()
    {
        
    }

    function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    function followtoggle(User $user) {
        $this->followers()->toggle($user->id);
//        event(new NewFollower($this));
    }

    public function hostedMeetups()
    {
        return $this->hasMany(Meetup::class);
    }

    public function attendsToMeetups()
    {
        return $this->belongsToMany(Meetup::class, 'meetup_user');
    }
}
