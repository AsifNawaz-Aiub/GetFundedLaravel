<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;

class userSupportController extends Controller
{
    public function index(){
        return view('userSupport.index');
    }
    public function userlist(){
        $userlist = User::all();
    	return view('userSupport.allUser')->with('userlist', $userlist);
    }
    public function userEventlist($id){
        $userEventlist = Event::whereIn('creatorId', [$id])->get();
    	return view('userSupport.userEvents')->with('userEventlist', $userEventlist);
    } 
    public function userEventDetails($id){
        $profile = User::find($id);
        return view('userSupport.userDetails', $profile);
    }
    public function eventlist(){
        $eventlist = Event::all();
    	return view('userSupport.allUser')->with('eventlist', $eventlist);
    }
    public function profile(Request $req){
    	$id = $req->session()->get('id');
        $profile = User::find($id);
        return view('userSupport.myProfile', $profile);
    }
    public function editProfileShow(Request $req){
    	$id = $req->session()->get('id');
        $profile = User::find($id);
        return view('userSupport.editProfile', $profile);
    }


}
