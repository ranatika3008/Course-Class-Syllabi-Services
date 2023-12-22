<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'creator_user_id'=>1,
            'name'=>'Microservice Architecture',
            'code'=>'CIT60037',
            'course_credit'=>2,
            'lab_credit'=>0,
            'type'=>'elective',
            'short_description'=>'Dalam mata kuliah ini dibahas materi yang berkaitan dengan pengenalan dan perancangan microservice. Perkuliahan dilakukan dengan metode ceramah yang berisikan dasar teori tentang prinsip-prinsip microservice, bagaimana mendesain sistem yang lebih simpel dibandingkan sistem dengan poendekatan monolitik. Dalam mata kuliah ini akan dibahas bagaimana menyediakan solusi kebutuhan sistem sebuah organisasi dengan pemodelan, integrasi, testing, dan deployment microservice yang berjalan secara autonomous.',
            'minimal_requirement'=>'',
            'study_material_summary'=>'Pengenalan SOA dan microservice, Evolusi arsitektur microservice, Goal, benefit, best practices microservices pada studi kasus, Memodelkan kebutuhan sistem dengan pendekatan microservice, Komunikasi proses bisnis menggunakan microservice, Integrasi proses bisnis dengan microservice, Antarmuka komunikasi microservice (API), Monolitich breakdown : studi kasus, Deployment microservice, Testing & Monitoring microservice, Microservice Technology, Microservice Security',
            'learning_media'=>'brone',
        ]);
        Course::create([
            'creator_user_id'=>1,
            'name'=>'Pemrograman Integratif',
            'code'=>'CIT61022',
            'course_credit'=>3,
            'lab_credit'=>1,
            'type'=>'mandatory',
            'short_description'=>'Mata kuliah ini ditujukan untuk memberikan pengetahuan dan pemahaman yang kuat kepada mahasiswa terhadap pengetahuan yang bersifat fundamental dan terkait teknis implementasi webservice dalam integrasi sistem menggunakan konsep arsitektur microservice dan teknologi RESTFul API. Matakuliah ini secara detail akan membahas mengenai arsitektur SOA, implementasi REST API menggunakan framework, middleware, dan implementasi keamanan webservice',
            'minimal_requirement'=>'Teknologi Integrasi Sistem',
            'study_material_summary'=>'Pengenalan SOA dan REST web service, Evolusi arsitektur REST, Studi kasus SOA pada bisnis (e-business), Struktur data XML dan JSON, Protokol RESTFul API, API Security, Protokol API pada Penyedia layanan cloud, Contoh penyedia layanan e-payment berbasis SOA untuk e-busines, Pengenalan framework Lumen, Rancang bangun API menggunakan framework, Deployment API, Implementasi layanan e-payment berbasis SOA untuk aplikasi e-commerce',
            'learning_media'=>'brone',
        ]);
    }
}
