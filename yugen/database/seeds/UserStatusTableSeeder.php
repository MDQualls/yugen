<?php

use App\User_Status;
use Illuminate\Database\Seeder;

class UserStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedStatuses = ['active', 'suspended'];

        foreach ($seedStatuses as $seedStatus)  {
            $status = User_Status::where('status', $seedStatus)->first();

            if(!$status)  {
                User_Status::create([
                    'status' => $seedStatus,
                ]);
            }
        }
    }
}
