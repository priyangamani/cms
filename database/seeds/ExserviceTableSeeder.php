<?php

use Illuminate\Database\Seeder;
use App\ExistService;

class ExserviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExistService::create([
        	'exservice'=>'None',
        	]);

        ExistService::create([
        	'exservice'=>'Streamyx',
        	]);

        ExistService::create([
        	'exservice'=>'Unifi',
        	]);
    }
}
