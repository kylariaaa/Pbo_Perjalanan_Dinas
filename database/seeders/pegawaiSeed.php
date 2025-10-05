<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class pegawaiSeed extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        DB::table("pegawai")->insert([
                'no_induk' => $faker->unique()->numberBetween(1000000, 2000000),
                'nama' => $faker->name,
                'email'=> $faker->email,
                'no_telepon' => $faker->phoneNumber(),
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
            ]);
        for($i = 0; $i <= 10; $i++){
            DB::table("pegawai")->insert([
                'no_induk' => $faker->unique()->numberBetween(1000000, 2000000),
                'nama' => $faker->name,
                'email'=> $faker->email,
                'no_telepon' => $faker->phoneNumber(),
                'password' => Hash::make('pegawai1234'),
                'role' => 'pegawai',
            ]);

        }
    }
}
