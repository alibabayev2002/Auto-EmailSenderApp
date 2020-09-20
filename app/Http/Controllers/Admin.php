<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Messages;
use App\Models\User;
  
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified','admin']);
    }
  
    public function index()
    {
        $email = Auth::user()->email;
        $users = DB::table('users')->get();
        return view('home')->with(['users'=>$users]);
    }
    public function get_email_verify() {
        return view('auth.verify');
    }
    public function get_message_panel() {
        $messages = Messages::orderBy('created_at','DESC')->paginate(8);
        return view('messagePanel',['messages'=>$messages]);
    }
}