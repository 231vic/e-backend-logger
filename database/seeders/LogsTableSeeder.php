<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class LogsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('logs');
        $table->truncate();

        $logs = [ 
            [
                'application_id'=>'1',
                'type'=>'error',
                'priority'=>'lowest',
                'path'=>'C:\\path_to_dir',
                'message'=>'Error message',
                'request'=>'Error request',
                'response'=>'Response message',
                'priority'=>'lowest',
                'created_at'=>'2020-11-23 17:39:56',
                'updated_at'=>'2020-11-23 17:39:56',
                'status'=>'1'
            ],
        ];
        $table->insert($logs);
    }
}
