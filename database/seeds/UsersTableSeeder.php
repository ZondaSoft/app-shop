<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// User::Create([
    	// php artisan db:seed
        //DB:table('users')->insert([
    	User::Create([
    		'name'	=>	'Daniel',
            'email'	=>	'zondasoftware@gmail.com',
            'password'=>bcrypt('123456'),
            'admin'=>   true
        ]);
    }
}
