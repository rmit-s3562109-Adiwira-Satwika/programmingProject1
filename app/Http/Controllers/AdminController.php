<?php

namespace ShareMarketGame\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public const INACTIVITY_WARNING = 30;

    public static function getInactiveUsers(){
    	//Set date to get users last active before
    	$checkDate = new date('now');
    	$checkDate->modify('-'+INACTIVITY_WARNING+' day');

    	//Request and return users only active before date
    	return DB::table('users')->where('last_active','<',$checkDate);
    }
}
