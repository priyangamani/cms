<?php

use Illuminate\Database\Seeder;
use App\Apptype;

class ApptypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apptype::create([
        	'type'=>'Consumer',
        	]);

        Apptype::create([
        	'type'=>'Business',
        	]);
    }
}
