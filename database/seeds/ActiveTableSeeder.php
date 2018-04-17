<?php

use Illuminate\Database\Seeder;
use App\Active;

class ActiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Active::create([
        	'status'=>'Yes',
        	]);

        Active::create([
        	'status'=>'No',
        	]);
    }
}
