<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

use App\Models\BlogEntry;
use App\Models\UserPost;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, AlgoliaEloquentTrait, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'avatar', 'profile_cover', 'email', 'slack_webhook_url', 'password', 'api_token', 'lat', 'lng', 'address', 'city', 'country', 'company', 'intro', 'website', 'github_url', 'twitter_url', 'facebook_url', 'linkedin_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'slack_webhook_url', 'api_token'
    ];

    public static $autoIndex = true;
    public static $autoDelete = true;
    public $indices = ['users'];

    public $algoliaSettings = [
        'attributesToIndex' => [
            'name', 'username', 'avatar', 'email', 'lat', 'lng', 'address', 'city', 'country', 'company', 'website', 'created_at'
        ],
        'customRanking' => [
            'asc(created_at)',
        ],
        'attributesForFaceting' => [
            'city', 'country'
        ],
        'attributesToRetrieve' => [
            'name', 'username', 'avatar', 'email', 'lat', 'lng', 'address', 'city', 'country', 'company', 'website'
        ],
        'attributesToHighlight' => [
            'name', 'username', 'city', 'county', 'company'
        ]
    ];

    public function getAlgoliaRecord()
    {
        $this->blog_entries();
        $this->posts();

        return $this->toArray();
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    /**
     * Route notifications for the Slack channel.
     *
     * @return string
     */
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
    }

    public function routeNotificationForOneSignal()
    {
        return 'ONE_SIGNAL_PLAYER_ID';
    }
}
