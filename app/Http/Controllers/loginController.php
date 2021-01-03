<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function verify(loginRequest $req){
        $user = User::where('password', $req->password)
                    ->where(function($query) use($req) {
                        $query->where('email', $req->uid)
                        ->orWhere('username', $req->uid);
                    })->first();

        if($user){
            $req->session()->put('username', $user->userName);
            $req->session()->put('type', $user->userType);
            $req->session()->put('id', $user->id);
            
            if($req->session()->get('type') == 'admin'){
                return redirect('/admin');
            }
            else if($req->session()->get('type') == 'moderator'){
                return redirect('/moderator');
            }
            else if($req->session()->get('type') == 'userSupport'){
                return redirect('/usersupport');
            }
            else if($req->session()->get('type') == 'user'){
                return redirect('/user');
            }
            else{
                $req->session()->flash('error', 'User type could not be determined');
                return redirect('/login');
            }
        }
        else{
            $req->session()->flash('error', 'Invalid username and/or password');
            return redirect('/login');
        }
    }
}
