<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\signupRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class signupController extends Controller
{
    public function index(){
        return view('signup.index');
    }

    public function register(signupRequest $req){
        $user = new User();

        $user->name = $req->name;
        $user->userName = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->userType = 'user';
        
        if($user->save()){
            $req->session()->flash('msg', 'Your account was created. Please login');
            return redirect('/login');
        }
        else{
            $req->session()->flash('error', 'An error occurred. Your account could not be created.');
            return redirect('/signup');
        }
    }
}
