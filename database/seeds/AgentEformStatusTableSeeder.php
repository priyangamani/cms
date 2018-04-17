<?php

use Illuminate\Database\Seeder;
use App\AgentEformStatus;

class AgentEformStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgentEformStatus::create([
            'status'=>'Pending',
            ]);

        AgentEformStatus::create([
            'status'=>'Incomplete',
            ]);

        AgentEformStatus::create([
            'status'=>'Complete',
            ]);
    }
}
