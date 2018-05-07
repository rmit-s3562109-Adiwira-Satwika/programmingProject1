<?php

namespace ShareMarketGame;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=['nickname','code','amount','value','dateTime','purchase'];

    public $timestamps = false;
}
