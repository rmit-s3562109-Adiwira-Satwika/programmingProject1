<?php

namespace ShareMarketGame;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['nickname','message'];
}
