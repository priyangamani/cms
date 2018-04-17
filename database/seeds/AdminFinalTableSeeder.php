<?php

use Illuminate\Database\Seeder;
use App\AdminFinal;

class AdminFinalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminFinal::create([
        	'status'=>'Approved',
        	]);

        AdminFinal::create([
        	'status'=>'Reject',
        	]);
    }
}
