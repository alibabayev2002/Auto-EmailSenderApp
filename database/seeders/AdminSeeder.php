<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            "name" => "admin",
            "email" => "admin@email.com",
            "type" => "admin",
            "password" =>  Hash::make("admin"),
            "email_verified_at" => date('Y-m-d H:i:s')
        ]);
    }
}
