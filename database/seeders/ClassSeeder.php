<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $teacherIds = DB::table('teachers')->pluck('id')->toArray();
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();

        for ($i = 1; $i <= 5; $i++) {
            DB::table('classes')->insert([
                'teacher_id' => $faker->randomElement($teacherIds),
                'subject_id' => $faker->randomElement($subjectIds),
                'class_name' => 'Class ' . $faker->word,
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
