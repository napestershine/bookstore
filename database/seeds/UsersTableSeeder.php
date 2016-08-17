<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/8/16
 * Time: 5:17 PM
 */

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'member@email.com',
            'password' => Hash::make('password'),
            'name' => 'Manoj Kumar',
            'admin' => 0
        ));

        User::create(array(
            'email' => 'admin@email.com',
            'password' => Hash::make('adminpassword'),
            'name' => 'admin',
            'admin' => 1
        ));
    }
}