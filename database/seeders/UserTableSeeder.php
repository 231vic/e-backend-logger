<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('user');
        $table->truncate();
        $users = [ 
            [
                'name'=>'Usuario de prueba',
                'email'=>'prueba@correo.com',
                'password'=>  bcrypt('contrasena'),
                'created_at'=>'2020-11-23 17:39:56',
                'updated_at'=>'2020-11-23 17:39:56',
                'status'=>'1'
            ],
        ];
        $table->insert($users);
    }
}
