<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Right;

class RightRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('role_name', 'administrator')->first();

        if ($role) {
            $rights = Right::all();

            foreach ($rights as $right) {
                if (!$role->hasRight($right->id)) {
                    $role->rights()->attach($right);
                }
            }
        }

        $role = Role::where('role_name', 'member')->first();

        if ($role) {
            $rights = Right::where('right_name', 'reader')->orWhere('right_name', 'commenter')->get();

            foreach ($rights as $right) {
                if (!$role->hasRight($right->id)) {
                    $role->rights()->attach($right);
                }
            }
        }
    }
}
