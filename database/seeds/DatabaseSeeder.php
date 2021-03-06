<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'admin',
            'email'=>'admin@gmail.com',
            'user_id'=>'admin',
            'departemen'=>'0000',
            'password'=>'$2y$10$VtgMmNr7xn8ikYXqVBiOHuY.CsGqDnddBajEk/p7n4KRcRGlW3X96',
            'role'=>'ADM']
        ]);  

        DB::table('role')->insert([
            ['role_id'=>'ADM',
            'desc'=>'Administrator',
            'status'=>'Y',
            
            ]
        ]);  

        // $this->call(UserSeeder::class);
    }
}
