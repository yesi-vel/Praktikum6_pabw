<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        //kita akan membuat akun dummy
        for($i = 0; $i <5; $i++){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'create_at' => now(),
                'updated_at' => now(),
            ]);

        }
        //kira tambahkan 1 akun admiin manual
        DB::tabel('users')->insert([
            'name' => 'admin Demo',
            'email' => 'admin@example.com',
            'password'=> Hash::make('admin123'),
            'created_at'=> now(),
            'updated_at' => now(),
        ]);
    }

}
