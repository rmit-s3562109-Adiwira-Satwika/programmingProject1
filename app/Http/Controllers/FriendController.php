<?php

namespace ShareMarketGame\Http\Controllers;

use Illuminate\Http\Request;
use ShareMarketGame\FriendRequest;
use ShareMarketGame\Friend;

class FriendController extends Controller
{
    public function sendFriendReq(Request $request)
    {
        $usrName = $request->input('usrName');
        $currTradeAcc = $request->input('currTradeAcc');

        $friend = new FriendRequest;
        $friend->to = $usrName;
        $friend->from = $currTradeAcc;
        $friend->save();
        return redirect()->back()->with('success', 'Successfully sent friend request!');
    }

    public function acceptFriendReq(Request $request)
    {
        $nickname = $request->input('currUser');
        $user = $request->input('fromUser');

        $friend = new Friend;
        $friend->nickname = $nickname;
        $friend->friend = $user;
        $friend->save();
        FriendRequest::where('to', '=', $nickname)->where('from', '=', $user)->delete();
        return redirect()->back()->with('success', 'Successfully accepted friend request!');
    }
}