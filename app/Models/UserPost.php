<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
