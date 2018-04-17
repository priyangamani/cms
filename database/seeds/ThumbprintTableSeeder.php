<?php

use Illuminate\Database\Seeder;
use App\ThumbprintStatus;

class ThumbprintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThumbprintStatus::create([
        	'status'=>'Yes',
        	]);

        ThumbprintStatus::create([
        	'status'=>'Assigned',
        	]);

        ThumbprintStatus::create([
        	'status'=>'No',
        	]);
    }
}
