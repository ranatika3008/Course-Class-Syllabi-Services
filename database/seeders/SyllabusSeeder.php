<?php

namespace Database\Seeders;

use App\Models\Syllabus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyllabusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Syllabus::create([
            'course_id'=>1,
            'title'=>'title A',
            'author'=>'author A',
            'head_of_study_program'=>'head of study program A'
        ]);
        Syllabus::create([
            'course_id'=>1,
            'title'=>'title B',
            'author'=>'author B',
            'head_of_study_program'=>'head of study program B'
        ]);
    }
}
