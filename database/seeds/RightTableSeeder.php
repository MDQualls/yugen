<?php

use Illuminate\Database\Seeder;
use App\Right;

class RightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedRights = ['reader', 'writer', 'commenter', 'user_manager'];

        foreach ($seedRights as $seedRight)  {
            $right = Right::where('right_name', $seedRight)->first();

            if(!$right)  {
                Right::create([
                    'right_name' => $seedRight,
                ]);
            }
        }
    }
}
