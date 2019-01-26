<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{
    public function run(){
        User::create([
            'name' => 'Kelvin Seeder',
            'email' => 'demo@vue.com',
            'password' => bcrypt('secret')
        ]);
    }
}
