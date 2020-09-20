<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Messages;
use App\Models\User;


class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:uptade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dateH = date('H:i');
        if(date('w')==0){
            $dateW = 7;
        }
        else{
            $dateW = date('w');
        }
        
        $messages = Messages::where('hour',$dateH)->where('weekday',$dateW)->get();
        foreach($messages as $message){
            $data = ["content" => $message->content , "subject" => $message->subject];
            $maild_id_str = $message->receiver;
            $email_user_id = explode(",",$maild_id_str);
            $users = User::whereIn('id',$email_user_id)->get();
            foreach($users as $user){
                Mail::to($user->email)->send(new SendMail($data));
            }
        }
    }
}
