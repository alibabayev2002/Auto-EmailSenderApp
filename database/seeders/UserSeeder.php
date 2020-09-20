<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = ["test@mail.ru","test2@mail.ru","test3@mail.ru","test4@mail.ru","test5@mail.ru","test6@mail.ru"];
        foreach($user as $user){
            User::insert([
                "name" => "user",
                "email" => $user,
                "type" => "user",
                "password" =>  Hash::make("user"),
                "email_verified_at" => date('Y-m-d H:i:s')
            ]);
        }
        
    }
}
