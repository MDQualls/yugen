<?php

use App\UserStatus;
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
            $status = UserStatus::where('status', $seedStatus)->first();

            if(!$status)  {
                UserStatus::create([
                    'status' => $seedStatus,
                ]);
            }
        }
    }
}
