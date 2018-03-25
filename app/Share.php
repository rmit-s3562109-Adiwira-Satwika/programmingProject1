<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{

    public $incrementing = false;
    protected $fillable = ['code','name','value'];
}
