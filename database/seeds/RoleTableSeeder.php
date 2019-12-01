<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedRoles = ['administrator', 'member'];

        foreach ($seedRoles as $seedRole) {
            $role = Role::where('role_name', $seedRole)->first();

            if(!$role)  {
                Role::create([
                   'role_name' => $seedRole,
                ]);
            }
        }
    }
}
