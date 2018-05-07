<?php

namespace ShareMarketGame;

use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    protected $fillable = ['trading_nickname','asx_code','quantity'];
}
