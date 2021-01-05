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
    public function ProfileUpdate(Request $req){
        $id = $req->session()->get('id');
        $user = User::find($id);
        $file = $req->file('image');

        $user->name     = $req->name;
        $user->userName = $req->userName;
        $user->email    = $req->email;
        $user->password = $req->password;
        $user->image    = $file->getClientOriginalName();
        $user->save();

        return redirect()->route('userSupport.myProfile');
    }
    public function viewEvent(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/userSupport/view');
       
      $data=$res->getBody();

    return response($data);
    }
    public function event(){
        return view('userSupport.viewEvents');
    }
    public function messageUser(){
        $userlist = User::all();
        return view('userSupport.message')->with('userlist', $userlist);
    }
    public function messageBoxUser($id){
        return view('userSupport.messageBox')->with('userId', $id);
    }
    public function messageView($id){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/userSupport/messageView/'.$id);
       
      $data=$res->getBody();

    return response($data);
    }
    public function allDonation($id){
        $donationlist = Donation::whereIn('eventId', [$id])->get();
        return view('userSupport.eventDonation')->with('donationlist', $donationlist);
    } 



}
