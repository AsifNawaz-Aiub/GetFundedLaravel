<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\signupRequest;
use App\Http\Requests\updateUserRequest;
use App\Http\Requests\updateEventRequest;
use App\Http\Requests\donationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Event;
use App\Donation;
use App\Message;
use GuzzleHttp;

class adminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    //MODERATORS
    public function moderators(){
        $moderatorList = User::where('userType', 'moderator')->get();

        return view('admin.moderators.index')->with('moderatorList', $moderatorList);
    }

    public function moderatorsAdd(){
        return view('admin.moderators.add');
    }

    public function createModerator(signupRequest $req){
        $user = new User();

        $user->name = $req->name;
        $user->userName = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->userType = 'moderator';
        
        if($user->save()){
            $req->session()->flash('msg', 'Moderator '.$user->userName.' was successfully created');
            return redirect('/admin/moderators');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Moderator could not be created.');
            return redirect('/admin/moderators/add');
        }
    }

    public function moderatorsEdit($id){
        $moderator = User::find($id);

        return view('admin.moderators.edit')->with('moderator', $moderator);
    }

    public function updateModerator(updateUserRequest $req){
        $user = User::find($req->id);

        $user->name = $req->name;
        $user->userName = $req->userName;
        $user->email = $req->email;
        
        if($user->save()){
            $req->session()->flash('msg', 'Moderator '.$user->userName.' was successfully updated');
            return redirect('/admin/moderators');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Moderator could not be updated.');
            return redirect('/admin/moderators/edit');
        }
    }

    public function deleteModerator(Request $req, $id){
        $moderator = User::find($id);
        if ($moderator->delete()) {
            $req->session()->flash('msg', 'Moderator '.$moderator->userName.' has been successfully deleted');
            return redirect('/admin/moderators');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Moderator could not be deleted.');
            return redirect('/admin/moderators/edit');
        }
        
    }
    //MODERATORS

    //USER SUPPORTS
    public function userSupports(){
        $userSupportList = User::where('userType', 'userSupport')->get();

        return view('admin.userSupports.index')->with('userSupportList', $userSupportList);
    }

    public function userSupportsAdd(){
        return view('admin.userSupports.add');
    }

    public function createUserSupport(signupRequest $req){
        $user = new User();

        $user->name = $req->name;
        $user->userName = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->userType = 'userSupport';
        
        if($user->save()){
            $req->session()->flash('msg', 'User Support '.$user->userName.' was successfully created');
            return redirect('/admin/userSupports');
        }
        else{
            $req->session()->flash('error', 'An error occurred. User Support could not be created.');
            return redirect('/admin/userSupports/add');
        }
    }

    public function userSupportsEdit($id){
        $userSupport = User::find($id);

        return view('admin.userSupports.edit')->with('userSupport', $userSupport);
    }

    public function updateUserSupport(updateUserRequest $req){
        $user = User::find($req->id);

        $user->name = $req->name;
        $user->userName = $req->userName;
        $user->email = $req->email;
        
        if($user->save()){
            $req->session()->flash('msg', 'User Support '.$user->userName.' was successfully updated');
            return redirect('/admin/userSupports');
        }
        else{
            $req->session()->flash('error', 'An error occurred. User Support could not be updated.');
            return redirect('/admin/userSupports/edit');
        }
    }

    public function deleteUserSupport(Request $req, $id){
        $userSupport = User::find($id);
        if ($userSupport->delete()) {
            $req->session()->flash('msg', 'User Support '.$userSupport->userName.' has been successfully deleted');
            return redirect('/admin/userSupports');
        }
        else{
            $req->session()->flash('error', 'An error occurred. User Support could not be deleted.');
            return redirect('/admin/userSupports/edit');
        }
        
    }
    //USER SUPPORTS

    //USERS
    public function users(){
        $userList = User::where('userType', 'user')->get();

        return view('admin.users.index')->with('userList', $userList);
    }

    public function usersAdd(){
        return view('admin.users.add');
    }

    public function createUser(signupRequest $req){
        $user = new User();

        $user->name = $req->name;
        $user->userName = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->userType = 'user';
        
        if($user->save()){
            $req->session()->flash('msg', 'User '.$user->userName.' was successfully created');
            return redirect('/admin/users');
        }
        else{
            $req->session()->flash('error', 'An error occurred. User could not be created.');
            return redirect('/admin/users/add');
        }
    }

    public function usersEdit($id){
        $user = User::find($id);

        return view('admin.users.edit')->with('user', $user);
    }

    public function updateUser(updateUserRequest $req){
        $user = User::find($req->id);

        $user->name = $req->name;
        $user->userName = $req->userName;
        $user->email = $req->email;
        
        if($user->save()){
            $req->session()->flash('msg', 'User '.$user->userName.' was successfully updated');
            return redirect('/admin/users');
        }
        else{
            $req->session()->flash('error', 'An error occurred. User could not be updated.');
            return redirect('/admin/users/edit');
        }
    }

    public function deleteUser(Request $req, $id){
        $user = User::find($id);
        if ($user->delete()) {
            $req->session()->flash('msg', 'User '.$user->userName.' has been successfully deleted');
            return redirect('/admin/users');
        }
        else{
            $req->session()->flash('error', 'An error occurred. User could not be deleted.');
            return redirect('/admin/users/edit');
        }
        
    }
    //USERS

    //EVENTS
    public function events(){
        $eventList = Event::get();

        return view('admin.events.index')->with('eventList', $eventList);
    }

    public function approveEvent(Request $req, $id){
        $event = Event::find($id);
        $event->isApproved = 1;

        if($event->save()){
            $req->session()->flash('msg', 'Event was successfully approved');
            return redirect('/admin/events');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Event could not be approved.');
            return redirect('/admin/events');
        }
    }

    public function declineEvent(Request $req, $id){
        $event = Event::find($id);
        $event->isApproved = 0;

        if($event->save()){
            $req->session()->flash('msg', 'Event was successfully declined');
            return redirect('/admin/events');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Event could not be declined.');
            return redirect('/admin/events');
        }
    }

    public function eventsEdit($id){
        $event = Event::find($id);

        return view('admin.events.edit')->with('event', $event);
    }

    public function updateEvent(updateEventRequest $req){
        $event = Event::find($req->id);

        $event->eventName = $req->eventName;
        $event->description = $req->description;
        $event->goalAmount = $req->goalAmount;
        $event->goalDate = $req->goalDate;
        
        if($event->save()){
            $req->session()->flash('msg', 'Event '.$event->eventName.' was successfully updated');
            return redirect('/admin/events');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Event could not be updated.');
            return redirect('/admin/events/edit');
        }
    }

    public function deleteEvent(Request $req, $id){
        $event = Event::find($id);
        if ($event->delete()) {
            $req->session()->flash('msg', 'Event '.$event->eventName.' has been successfully deleted');
            return redirect('/admin/events');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Event could not be deleted.');
            return redirect('/admin/events');
        }
    }

    public function viewEvent($id){
        $event = Event::find($id);
        $creator = User::find($event->creatorId);
        $donationList = Donation::where('eventId', $id)->get();
        $donationSum = 0;
        foreach ($donationList as $donation){
            $donationSum += $donation->amount;
        }

        return view('admin.events.view')
            ->with('event', $event)
            ->with('donationList', $donationList)
            ->with('donationSum', $donationSum)
            ->with('creator', $creator);
    }
    
    public function donateEvent($id){
        $event = Event::find($id);

        return view('admin.events.donate')
            ->with('event', $event);
    }

    public function donateToEvent(donationRequest $req, $id){
        $donation = new Donation();

        $donation->amount = $req->amount;
        $donation->donorId = $req->session()->get('id');
        $donation->eventId = $req->eventId;
        $donation->donationMessage = $req->message;
        
        if($donation->save()){
            $req->session()->flash('msg', 'Donation of '.$donation->amount.' BDT was successfull');
            return redirect('/admin/events/view/'.$id);
        }
        else{
            $req->session()->flash('error', 'An error occurred. Could not donate.');
            return redirect('/admin/events/view/'.$id);
        }
    }
    //EVENTS

    //MESSAGES

    public function convoMessages(Request $req, $id){
        $receiver = User::find($id);

        $rightMessageList = Message::where('receiverId', $id)->where('senderId', $req->session()->get('id'))->get();
        $leftMessageList = Message::where('receiverId', $req->session()->get('id'))->where('senderId', $id)->get();
        
        foreach ($leftMessageList as $leftMessage) {
            $leftMessage->side = "float-left";
        }

        foreach ($rightMessageList as $rightMessage) {
            $rightMessage->side = "float-right";
        }

        $messages = $leftMessageList->merge($rightMessageList);
        $sortedMessages = $messages->sortBy('createdAt');

        return view('admin.messages.convo')
        ->with('receiver', $receiver)
        ->with('senderId', $req->session()->get('id'))
        ->with('messages', $sortedMessages);
    }

    public function sendMessage(Request $req){
        $message = new Message();

        $message->senderId = $req->session()->get('id');
        $message->receiverId = $req->receiverId;
        $message->messageText = $req->msg;

        if($message->save()){
            return response()->json([
                'status' => 'success',
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
            ]);
        }
    }
    //MESSAGES

    //REPORTS
    public function reports(){
        return view('admin.reports.index');
    }

    public function donationsReportDownload(Request $req){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://127.0.0.1:4000/admin/api/reports/donations/download');
        // $fileString = (string)$res->getBody();//->download(public_path(). "/download/info.pdf", 'filename.pdf');
        // Storage::disk(public_path)->put('Donation Report.xlsx', $fileString);

        return response($res->getBody())
                ->withHeaders([
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="Donation Report.xlsx',
                ]);

        // $client = new Client();
        // $resource = fopen('/path/to/file', 'w');
        // $stream = GuzzleHttp\Psr7\stream_for($resource);
        // $res = $client->request('GET', 'http://127.0.0.1:4000/admin/reports/donations/download', ['save_to' => $stream]);
        // return $res->getStatusCode().$res->getHeader('content-type')[0].$res->getBody();
    }
}
