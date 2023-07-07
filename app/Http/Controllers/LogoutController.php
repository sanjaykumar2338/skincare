<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LogoutController extends Controller {
    public function perform(){
        User::where('id',Auth::user()->id)->update(['online'=>0]);
        Session::flush();        
        Auth::logout();
        return redirect('/home');
    }
}