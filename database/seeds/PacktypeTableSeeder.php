<?php

use Illuminate\Database\Seeder;
use App\PackType;

class PacktypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PackType::create([
        	'type'=>'Resident',
        	]);

        PackType::create([
        	'type'=>'Business',
        	]);
    }
}
