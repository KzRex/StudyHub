<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $classroomIds = DB::table('classes')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('students')->insert([
                'fullname' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'date_of_birth' => $faker->date(),
                'class_id' => $faker->randomElement($classroomIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
