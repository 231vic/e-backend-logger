<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AuthorizationsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('authorizations');
        $table->truncate();
        $authorizations = [ 
            [
                'application_id'=>'1',
                'token'=>'token',
                'created_at'=>'2020-11-23 17:39:56',
                'updated_at'=>'2020-11-23 17:39:56',
                'status'=>'1'
            ],
        ];
        $table->insert($authorizations);
    }
}
