<?php

namespace PHPMap\Models;

use Illuminate\Database\Eloquent\Model;
use PHPMap\User;

class UserPost extends Model
{
    protected $fillable = [
        'user_id', 'body'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
