<?php

use Illuminate\Database\Seeder;
use App\DocsUpload;

class DocsuploadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocsUpload::create([
        	'docsup'=>'Yes',
        	]);

        DocsUpload::create([
        	'docsup'=>'No',
        	]);
    }
}
