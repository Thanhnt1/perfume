<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);
        //
        $user = new User;
        $user->role_id = $role->id;
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123456');
        $user->phone = '123456789';
        $user->sex = 'Male';
        $user->avatar = '/Logo.png';
        $user->save();
        //
    }
}
