<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    public $incrementing = false;
    protected $fillable = ['nickname','code','quantity'];
}