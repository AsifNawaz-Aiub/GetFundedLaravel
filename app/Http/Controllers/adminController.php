<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\signupRequest;
use App\Http\Requests\updateUserRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class adminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    //MODERATORS
    public function moderators(){
        $moderatorList = User::where('userType', 'moderator')->get();

        return view('admin.moderators')->with('moderatorList', $moderatorList);
    }

    public function moderatorsAdd(){
        return view('admin.moderatorsAdd');
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

        return view('admin.moderatorsEdit')->with('moderator', $moderator);
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

        return view('admin.userSupports')->with('userSupportList', $userSupportList);
    }

    public function userSupportsAdd(){
        return view('admin.userSupportsAdd');
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

        return view('admin.userSupportsEdit')->with('userSupport', $userSupport);
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

        return view('admin.users')->with('userList', $userList);
    }

    public function usersAdd(){
        return view('admin.usersAdd');
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

        return view('admin.usersEdit')->with('user', $user);
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
}
