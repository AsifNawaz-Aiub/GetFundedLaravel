<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use Validator;
use App\Event;
use App\Donation;
use App\Vote;
use App\Comment;
use App\Report;
use App\User;
use App\Message;


class userController extends Controller
{
    public function index(Request $req){
        return view('user.index', ['username'=> $req->session()->get('username')]);
    }
    public function eventlist(){
        $events = Event::all();
        return view('user.viewEvents')->with('events', $events);
    }
    public function eventlistById(Request $req){
        $id = $req->session()->get('id');
        $events = Event::whereIn('creatorId', [$id])->get();
        return view('user.myEvent')->with('events', $events);
    }

    public function createEvent(){    
    	return view('user.createEvent');
    }
    public function store(userRequest $req){

        if($req->hasFile('eventPicture')){
        	
            $file = $req->file('eventPicture');

            if($file->move('upload', $file->getClientOriginalName())){
               
                $event = new Event();
                $event->eventName    = $req->eventName;
                $event->creatorId    = $req->session()->get('id');
                $event->managerId    = $req->session()->get('id');
                $event->description  = $req->description;
                $event->categoryId   = $req->categoryId;
                $event->goalAmount   = $req->goalAmount;
                $event->goalDate     = $req->goalDate;
                $event->eventPicture = $file->getClientOriginalName();

                if($event->save()){
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
    public function eventUpdated($id, Request $req){
        $eventupdate = Event::find($id);
        
        $eventupdate->eventName     = $req->eventName;
        $eventupdate->description   = $req->description;
        $eventupdate->categoryId    = $req->categoryId;
        $eventupdate->goalAmount    = $req->goalAmount;
        $eventupdate->goalDate      = $req->goalDate;

        $eventupdate->save();

        return redirect()->route('user.myEvent');

    }

    public function eventDelete($id){
        $eventDelete = Event::find($id);
        return view('user.eventDelete', $eventDelete);
    }
    public function eventDestroyed($id, Request $req){
        $eventdelete = Event::find($id);
        
        $eventdelete->eventName     = $req->eventName;
        $eventdelete->description   = $req->description;
        $eventdelete->categoryId    = $req->categoryId;
        $eventdelete->goalAmount    = $req->goalAmount;
        $eventdelete->goalDate      = $req->goalDate;

        $eventdelete->delete();

        return redirect()->route('user.myEvent');

    }

    public function eventdonate($id){
        $eventDonate = Donation::whereIn('eventId', [$id])->get();
        return view('user.eventDonate')->with('eventDonate', $eventDonate);
    }

    public function approve(){
        $approval = Donation::whereIn('isApprove', [0])->get();
        return view('user.approveDonation')->with('approval', $approval);
    }

    public function acceptdonate($id){
        $acceptdonate = Donation::find($id);
        return view('user.acceptpage')->with('acceptdonate', $acceptdonate);
    }
    public function approved($id){
        $approvaled = Donation::find($id);

        $approvaled->isApprove = 1;
        $approvaled->save();
        return redirect()->route('user.viewEvents');
       
    }

    public function donateToEvent($id){
        $donateEvent = Donation::whereIn('eventId', [$id])->get();
        return view('user.donateToEvent')->with('donateEvent', $donateEvent);
    }
    public function donatedToEvent($id , Request $req){
               
                $donated = new Donation();

                $donated->amount            = $req->amount;
                $donated->donorId           = $req->session()->get('id');
                $donated->eventId           = $id;
                $donated->isApprove         = 0;
                $donated->donationMessage   = $req->donationMessage;
    
                $donated->save();
                return redirect()->route('user.viewEvents');
        }
    
    public function voteToEvent($id){
        $voteEvent = Event::find($id);
        return view('user.voteToEvent', $voteEvent);
    }
    public function insertVote($id , Request $req){      
        $voted = new Vote();

        $voted->voterId   = $req->session()->get('id');
        $voted->eventId   = $id;
        $voted->value     = $req->val;

        $voted->save();
        return redirect()->route('user.viewEvents');
    }

    public function commentToEvent($id){
        $commentEvent = Event::find($id);
        return view('user.commentToEvent', $commentEvent);
    }
    public function commentedToEvent($id , Request $req){
               
                $comment = new Comment();

                $comment->commenterId   = $req->session()->get('id');
                $comment->eventId       = $id;
                $comment->commentText   = $req->commentText;
    
                $comment->save();
                return redirect()->route('user.viewEvents');
                

    }

    public function reportToEvent($id){
        $reportEvent = Event::find($id);
        return view('user.reportToEvent', $reportEvent);
    }
    public function reportedToEvent($id , Request $req){
               
                $report = new Report();

                $report->creatorId = $req->session()->get('id');
                $report->eventId   = $id;
                $report->message   = $req->message;
    
                $report->save();
                return redirect()->route('user.viewEvents');          

    }
    public function eventManagers(Request $req){
        $id = $req->session()->get('id');
        $events = Event::whereIn('managerId', [$id])->get();
        return view('user.eventManager', $events)->with('events', $events);
    }
    public function addEventManager($id){
        $user = User::whereIn('usertype', ['user'])->get();
        return view('user.addEventManager')->with('user', $user);
    }
    public function updateEventManager($id, Request $req){
        $eventupdate = Event::find($id);
        
        $eventupdate->managerId = $req->userId;
        $eventupdate->save();

        return redirect()->route('user.myEvent');

    }
    public function messageWithU(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/user/view');
       
      $data=$res->getBody();

    return response($data);
    }

    public function message(){
        return view('user.message');
    }

    public function viewMessage(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/user/viewMessage');
       
      $data=$res->getBody();

    return response($data);
    }

    public function messagetoUsersupport(){
        return view('user.messageToUserSupport');
    }
    public function messagetousersupp(Request $req , $id){
        $messagetous = new Message();

        $messagetous->senderId     = $req->session()->get('id');
        $messagetous->receiverId   = $id;
        $messagetous->messageText  = $req->messageToUs;

        $messagetous->save();
        return redirect()->route('user.message');   
    }
} 

