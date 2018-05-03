<?php

namespace ShareMarketGame;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $primaryKey = 'nickname';
    protected $fillable = ['nickname','message'];
}
