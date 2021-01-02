<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\DB;
//use Validator;
use App\User;
use App\Event;

class moderatorController extends Controller
{
    public function index(){
        $id=23;
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
    
    
    
   

    
}
