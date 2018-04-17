<?php

use Illuminate\Database\Seeder;
use App\JobStatus;

class JobStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobStatus::create([
        	'jobstat'=>'Pending',
        	]);

        JobStatus::create([
        	'jobstat'=>'Incomplete',
        	]);

        JobStatus::create([
        	'jobstat'=>'Done',
        	]);
    }
}
