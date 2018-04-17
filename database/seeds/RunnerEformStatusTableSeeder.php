<?php

use Illuminate\Database\Seeder;
use App\RunnerEformStatus;

class RunnerEformStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RunnerEformStatus::create([
        	'status'=>'Yes',
        	]);

        RunnerEformStatus::create([
        	'status'=>'No',
        	]);
    }
}
