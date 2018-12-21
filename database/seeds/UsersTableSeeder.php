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
        $admin = new User();
        $admin->name = 'Dima Maimesko';
        $admin->email = 'dima.maimesko@gmail.com';
        $admin->email_verified_at = now();
        $admin->password = bcrypt('111111');
        $admin->remember_token = str_random(10);
        $admin->save();

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('user');
        $user->remember_token = str_random(10);
        $user->save();

        factory(User::class, 10)->create();


    }
}
