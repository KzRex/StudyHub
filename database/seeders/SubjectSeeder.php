<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $subjects = ['Mathematics', 'Science', 'History', 'English', 'Physics', 'Biology'];

        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'name' => $subject,
                'difficulty' => $faker->randomElement(['easy', 'medium', 'hard']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
