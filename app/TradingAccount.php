<?php

namespace ShareMarketGame;

use Illuminate\Database\Eloquent\Model;
use ShareMarketGame\Friend;

class TradingAccount extends Model
{
    protected $primaryKey = 'nickname';
    public $incrementing = false;
    protected $fillable = ['nickname','balance','user_id'];

    public function isFriend($friendName){

    	//Gte all friends
    	$friendds=Friend::where('nickname', '=', $this->nickname, 'or')->where('friend', '=', $this->nickname);

    	//Check if no friends exist
    	if($friends->isEmpty()){
    		return false;
    	}

    	//CHeck if each friend matches given name
    	foreach ($friends as $friend) {
    		//Return true if match found
    		if($friend->nickname==$friendname || $friend->friend==$friendname){
    			return true;
    		}
    	}

    	//Return false if friend not found
    	return false;
    }
}
