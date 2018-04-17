<?php

use Illuminate\Database\Seeder;
use App\AdminEformStatus;

class AdminEformStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminEformStatus::create([
            'status'=>'Assigned',
            ]);

        AdminEformStatus::create([
            'status'=>'Pending Approval',
            ]);

        AdminEformStatus::create([
            'status'=>'Complete',
            ]);

        AdminEformStatus::create([
            'status'=>'Incomplete',
            ]);
    }
}
