<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\modifyRequest;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Validator;
use App\User;
use App\Event;
use App\Message;
use App\Donation;


class moderatorController extends Controller
{  
    
    public function index(Request $req){
       
        $id =  $req->session()->get('id');
        $users = User::find($id);
        $events = Event::all();
        $req->session()->flash('error', 'Logged In');
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
    public function modified($id, modifyRequest $req ){

        $event = Event::find($id);

        $event->eventName = $req->eventName;
        $event->description = $req->description;
        $event->categoryId = $req->categoryId;
        $event->goalAmount    = $req->goalAmount;
        if($event->save()){
            $req->session()->flash('error2', 'Event Modified');
            return redirect('/moderator');
        }else{
            echo "error";
        }
          
    }
    public function donate($id){

        $event = Event::find($id);
        return view('moderator.donate', $event);
        
    }
    public function donated($id, Request $req){

        $donate = new Donation();

        $donate->amount = $req->amount;
        $donate->donorId = $req->session()->get('id');
        $donate->eventId = $id;
        $donate->donationMessage = $req->message;
        if($donate->save()){
            return redirect('/moderator');
        }else{
            echo "error";
        }
      
        
    }
    public function getMsg($id, Request $req){
        $sid =  $req->session()->get('id');
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/moderator/msg/'.$id.'/'.$sid);
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
       //echo $res->getBody();
       
      $d=$res->getBody();
    
    
    //echo $d;
    
    return response($d);
    


    }

    public function getFeed(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/moderator/feed');
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
       //echo $res->getBody();
       
      $d=$res->getBody();
    
    
    //echo $d;
    
    return response($d);
    


    }

    public function getReport(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/moderator/excelsheet');
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
       //echo $res->getBody();
       
      $d=$res->getBody();
    
    
    //echo $d;
    
    return response($d);
    


    }
   

    
}
