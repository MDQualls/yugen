<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('role_name', 'administrator')->first();

        $user = User::where('email', 'mqualls@gmail.com')->first();

        if (!$user) {

            User::create([
                'name' => 'MichaelQ',
                'email' => 'mqualls@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $role->id,
            ]);
        }

        $user = User::where('email', 'holly.qualls@gmail.com')->first();

        if (!$user) {

            User::create([
                'name' => 'HollyQ',
                'email' => 'holly.qualls@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $role->id,
            ]);
        }
    }
}
