<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get the user associated with the tweet.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
