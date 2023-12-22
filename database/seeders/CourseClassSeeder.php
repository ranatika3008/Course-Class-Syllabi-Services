<?php

namespace Database\Seeders;

use App\Models\CourseClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseClass::create([
            'course_id'=>1,
            'syllabus_id'=>1,
            'name'=>'Kelas A',
            'thumbnail_img'=>'https://via.placeholder.com/640x480.png/001166?text=Kelas%20A',
            'class_code'=>'kodeA',
            'creator_user_id'=>1,
        ]);
        CourseClass::create([
            'course_id'=>2,
            'syllabus_id'=>2,
            'name'=>'Kelas B',
            'thumbnail_img'=>'https://via.placeholder.com/640x480.png/009566?text=Kelas B',
            'class_code'=>'kodeB',
            'creator_user_id'=>1,
        ]);
    }
}
