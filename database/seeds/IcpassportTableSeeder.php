<?php

use Illuminate\Database\Seeder;
use App\IcPassport;

class IcpassportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IcPassport::create([
        	'icpass'=>'IC',
        	]);

        IcPassport::create([
        	'icpass'=>'Passport',
        	]);
    }
}
