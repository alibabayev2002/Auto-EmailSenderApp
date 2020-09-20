<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Auth;
// use App\Models\Messages;
use App\Models\User;

class MainController extends Controller
{
    public function verify_email(){
        return view('auth.verify');
    }
    public function delete_profile(){
        User::where('id',Auth::user()->id)->delete();
        return back();
    }
    public function get_profile(){
        return view('profile');
    }
    public function post_profile(request $request){
        $validatedData = $request->validate([
            'name' => 'required | string | max:255',
        ]);
        User::where('id',Auth::user()->id)->update([
            "name"=> $request->name,
        ]);
        return back();
    }
}
