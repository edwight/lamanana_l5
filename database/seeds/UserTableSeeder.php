<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Hashing\Hasher;
use lamanana\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
    	$user = new User;
    	$user->name ="edwight";
    	$user->email="edwardelgado0@gmail.com";
    	$user->password= \Hash::make('samurai123');
    	$user->type='admin';
    	$user->save();

    }

}