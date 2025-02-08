<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('teachers')->insert([
                'fullname' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'date_of_birth' => $faker->date(),
                'subject_id' => $faker->randomElement($subjectIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
