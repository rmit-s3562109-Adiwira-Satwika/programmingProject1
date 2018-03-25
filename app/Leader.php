<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    public $incrementing = false;
    protected $fillable = ['place','nickname','date','trading_value'];
}
