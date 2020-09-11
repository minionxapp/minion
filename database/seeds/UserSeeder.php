<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $seq = 1012;
        foreach(range(0,1000) as $i){
            $seq++;
            DB::table('users')->insert([
                'user_id' => "P".$seq,
                'name'=>$faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'role' => 'URS',
            ]);
        }
    }
}
