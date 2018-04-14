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
}
