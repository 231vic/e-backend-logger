<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AplicationsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('aplications');
        $table->truncate();
        $aplications = [ 
            [
                'name'=>'Aplicación',
                'created_at'=>'2020-11-23 17:39:56',
                'updated_at'=>'2020-11-23 17:39:56',
            ],
        ];
        $table->insert($aplications);
    }
}
