<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user1 = new User;

      $user1->name            = "Jonas Van Reeth";
      $user1->email           = "jonasvanreeth@gmail.com";
      $user1->password        = Hash::make('test');

      $user1->save();
    }
}
