<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Messages;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','admin']);
    }
  
    public function index()
    {
        $email = Auth::user()->email;
        $users = User::where('email_verified_at','!=','null')->get();
        return view('home')->with(['users'=>$users]);
    }
    
    public function get_message_panel() {
        $messages = Messages::orderBy('created_at','DESC')->paginate(8);
        return view('messagePanel',['messages'=>$messages]);
    }
    public function delete_message($id) {
        Messages::where('id',$id)->delete();
        return back();
    }
    public function get_edit_message($id) {
        $users = User::get();
        $message =  Messages::where('id',$id)->first();
        $received_all_id = explode(",",$message->receiver);
        $weekday = $message['weekday'];
        return view('editmessage')->with(
            [
                'users'=>$users,
                'message'=>$message,
                'received'=>$received_all_id,
            ]);
    
    }
    public function post_edit_message($id,Request $request) {
        $validatedData = $request->validate([
            'content' => 'required',
            'hour' => 'required',
            'weekday' => 'required',
            'title' => 'required',
            'email' => 'required'
        ]);
    $email_id = implode(',',$request->email);
    
    Messages::where('id',$id)->update([
            "sender" => Auth::user()->email,
            "receiver" => $email_id,
            "content" => $request->content,
            "hour" => $request->hour,
            "subject" => $request->title,
            "weekday" => $request->weekday,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $messages = Messages::orderBy('created_at','DESC')->paginate(8);
        $users = User::get();
        $message =  Messages::where('id',$id)->first();
        $received_all_id = explode(",",$message->receiver);
        $weekday = $message['weekday'];
        return view('editmessage')->with(
            [
                'users'=>$users,
                'message'=>$message,
                'received'=>$received_all_id,
            ]);
    
    }
    public function send_message(Request $request) {
            $validatedData = $request->validate([
                'content' => 'required',
                'hour' => 'required',
                'weekday' => 'required',
                'title' => 'required',
                'email' => 'required',
            ]);
        $email_id = implode(',',$request->email);
        Messages::insert([
                "sender" => Auth::user()->email,
                "receiver" => $email_id,
                "content" => $request->content,
                "hour" => $request->hour,
                "subject" => $request->title,
                "weekday" => $request->weekday,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ]);
            $users = User::get();
     return view('home',['users'=>$users]);
    }
}
