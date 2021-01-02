<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\DB;
//use Validator;
use App\User;
use App\Event;
use App\Message;

class moderatorController extends Controller
{
    public function index(Request $req){
        $id =  $req->session()->get('id');
        $users = User::find($id);
        $events = Event::all();
        
        return view('moderator.index')->with('users', $users)->with('events', $events);
        //return view('moderator.index',$user);
    }

    public function approve($id){

        $event = Event::find($id);
        return view('moderator.approve', $event);
        
    }

    public function approved($id){
        $event = Event::find($id);

        $event->isApproved = 1;
        $event->save();
        return redirect('/moderator');
       
    }

    public function decline($id){

        $event = Event::find($id);
        return view('moderator.decline', $event);
        
    }

    public function declined($id, Request $req){
        $event = Event::find($id);

        $msg = new Message();

        $msg->senderId = $req->session()->get('id');
        $msg->receiverId = $event->creatorId;
        $msg->messageText=  $req->message;
        if($msg->save()){
            $event->delete();
            return redirect('/moderator');
        }else{
            echo "error";
        }
        
    }
    
    public function modify($id){

        $event = Event::find($id);
        return view('moderator.modify', $event);
        
    }
    public function modified($id, Request $req){

        $event = Event::find($id);

        $event->eventName = $req->eventName;
        $event->description = $req->description;
        $event->categoryId = $req->categoryId;
        $event->goalAmount    = $req->goalAmount;
        if($event->save()){
            return redirect('/moderator');
        }else{
            echo "error";
        }
          
    }
    
   

    
}
