<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use Validator;
use App\Event;
use App\Donation;

class userController extends Controller
{
    public function index(Request $req){
        return view('user.index', ['username'=> $req->session()->get('username')]);
    }
    public function eventlist(){
        $events = Event::all();
        return view('user.viewEvents')->with('events', $events);
    }
    public function eventlistById(){
        $events = Event::whereIn('creatorId', [1 , 3])->get();
        return view('user.myEvent')->with('events', $events);
    }
    public function createEvent(){    
    	return view('user.createEvent');
    }
    public function store(userRequest $req){

        if($req->hasFile('image')){
        	
            $file = $req->file('image');

            if($file->move('upload', $file->getClientOriginalName())){
               
                $user = new User();

                $user->name         = $req->name;
                $user->userName     = $req->userName;
                $user->email        = $req->email;
                $user->password     = $req->password;
                $user->userType     = $req->userType;
                $user->image        = $file->getClientOriginalName();

                if($user->save()){
                    return redirect()->route('user.myEvent');
                }

            }else{
                echo "error";
            }
        }
    }
    public function eventEdit($id){
        $eventEdit = Event::find($id);
        return view('user.eventEdit', $eventEdit);
    }
    public function eventDelete($id){
        $eventDelete = Event::find($id);
        return view('user.eventDelete', $eventDelete);
    }
    public function eventdonatelist($id){
        $eventDonate = Donation::whereIn('eventId', [$id])->get();
        return view('user.eventDonate')->with('eventDonate', $eventDonate);
    }
    public function donationlist(){
        $donation = Donation::all();
        return view('user.approveDonation')->with('donation', $donation);
    }
   public function donateToEvent($id){
        $donateEvent = Donation::whereIn('eventId', [$id])->get();
        return view('user.donateToEvent')->with('donateEvent', $donateEvent);
    }
    public function voteToEvent($id){
        $voteEvent = Event::find($id);
        return view('user.voteToEvent', $voteEvent);
    }
    public function commentToEvent($id){
        $commentEvent = Event::find($id);
        return view('user.commentToEvent', $commentEvent);
    }
    public function reportToEvent($id){
        $reportEvent = Event::find($id);
        return view('user.reportToEvent', $reportEvent);
    }
} 

