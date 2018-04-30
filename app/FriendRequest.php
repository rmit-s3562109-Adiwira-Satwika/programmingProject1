<?php

namespace ShareMarketGame;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    public $incrementing = false;
    protected $fillable = ['from','message'];
}
