<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $User1 = new App\User();
      $User1->username = 'user1';
      $User1->password = Hash::make('password');
      $User1->display_name = 'Ima User';
      $User1->bio = "I'm a chat user!";
      $User1->save();

      $Guild1 = new App\Guild();
      $Guild1->user_id = $User1->id;
      $Guild1->display_name = 'Self DM';
      $Guild1->save();
    }
}
