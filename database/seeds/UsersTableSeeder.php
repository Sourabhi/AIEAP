<?php

use Illuminate\Database\Seeder;
use aieapV1\Role;
use aieapV1\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new User();
        $user->name='Sourabhi';
        $user->email='sou@yahoo.com';
        $user->password= bcrypt('Sourabhi123$');
        $user->save();
        $user->roles()->attach(Role::where('role','Admin')->first());
    }
}
