<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Traigo todas las seeder para ejecutar una sola línea de código*/
        $this->call([
            
            UserTableSeeder::class,
            AplicationsTableSeeder::class,
            AuthorizationsTableSeeder::class,
            LogsTableSeeder::class,
        ]);
    }
}
