<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userSupportRequest;
use Maatwebsite\Excel\Concerns\FormCollection;
use App\User;
use App\Message;
use App\Event;
use App\Donation; 
use App\Notification; 

class userSupportController extends Controller
{
    public function index(){
        $notification = Notification::all();
        return view('userSupport.index')->with('notification', $notification);
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
    public function messageView($id){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/userSupport/messageView/'.$id);
       
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
        $message = Message::whereIn('senderId', [$id])->get();
        return view('userSupport.messageBox')->with('message', $message);
    } 
    
    public function allDonation($id){
        $donationlist = Donation::whereIn('eventId', [$id])->get();
        return view('userSupport.eventDonation')->with('donationlist', $donationlist);
    }
    public function donatedToEvent($id , userSupportRequest $req){      
        $donated = new Donation();
        $note = new Notification();

        $donated->amount            = $req->amount;
        $donated->donorId           = $req->session()->get('id');
        $donated->eventId           = $id;
        $donated->isApprove         = 0;
        $donated->donationMessage   = $req->donationMessage;
            
        $note->message        = 'one new donation';
        $note->link           = '/userSupport/eventDonation/'.$id;
        $note->creatorId      =  $req->session()->get('id');

        $note->save();

        $donated->save();
        return redirect()->route('userSupport.viewEvents');
        
    }
    public function sendMessage($id , Request $req){
        $messagetous = new Message();

        $messagetous->senderId     = $req->session()->get('id');
        $messagetous->receiverId   = $id;
        $messagetous->messageText  = $req->messageText;

        $messagetous->save();
        return redirect()->route('userSupport.message');   
    }
    public function dMessage($id){
        $message = Message::find($id);
        return view('userSupport.deleteMessage', $message);
    }
    public function collection() 
    {
        return User:: all();
    }
    public function messageDestroyed($id, Request $req){
        $message = Message::find($id);

        $message->delete();

        return redirect()->route('userSupport.message');

    }

}
