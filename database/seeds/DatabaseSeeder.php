<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Instagram;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Role::create([
        	"id"=>1,
        	"role"=>"admin"
        ]);
        User::create([
        	"role_id"=>1,
        	"name"=>"Admin",
        	"email"=>"asegaf@ymail.com",
        	"password"=>bcrypt("admin")
        ]);
        Instagram::create([
            "user_id"=>1,
            "username" => "azwar724",
            "password" => "aamgaul724698"
        ]);
    }
}
