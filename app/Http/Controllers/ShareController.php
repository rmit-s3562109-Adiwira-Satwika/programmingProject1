<?php

namespace ShareMarketGame\Http\Controllers;

use Illuminate\Http\Request;

class ShareController extends Controller
{
	//Get array of all tracked shares
	public function getAllShares(){
		return Share::orderBy('code')->get();
	}

	//Find share by code
	public function getByCode($search){
		return Share::where('code', 'LIKE', '%'.$search.'%')->get();
	}

	//Find share by name
	public function getByName($search){
		return Share::where('name', 'LIKE', '%'.$search.'%')->get();
	}

	/** Request share data over time based on input
	*	@param $code asx stock code
	*	@param $time Time period for each value 1,5,15,30 or 60 only
	*	@param $limit Number of responses to limit return to
	*	@return Returns false on invalid input otherwise returns array of values
	*/
	public function requestShareData($code,$time,$limit){
		//Check for valid time and limit input
		if($time!=1||$time!=5||$time!=15||$time!=30||$time!=60||$limit>100){
			return false;
		}

		//Get api response and grab data section
		$response=json_decode(file_get_contents("https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol="+$code+".ax&interval=+"$time"+min&apikey=6DD89FIYMJ57CPGO"));
        $section= $response["Time Series ("+$time+"min)"];

        //Add each value to limit
        $array=array();
        for($i=0;$i<$limit,$i++){
        	$array_push($array,$section[$i]["4. close"]);
        }
        return $array;
	}
}
