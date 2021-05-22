<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = ['online','physical','both'];
        $clientoption = ['physical','online'];

        DB::table('programs')->insert([
            'name' => 'Program A',
            'type' => 'Communication',
            'slug' => Str::slug('Program A'),
            'code' => 'ICT30005',
            'length' => 3,
            'price' => rand(10,100),
            'option' => 'online',
            'status' => 'approved',
            'description' => 'students will study the four skills assessed in the IELTS exam: speaking, listening, reading and writing. In the mornings, students will focus on building their overall level of English grammar, vocabulary, pronunciation, listening, speaking, reading and writing skills.',
            'thumbnail_path' => 'test.png',
            'training_document' => 'document.zip',
            'created_at' => '2021-04-22 12:53:34',
        ]);
        DB::table('programs')->insert([
            'name' => 'Program B',
            'slug' => Str::slug('Program B'),
            'type' => 'Presentation',
            'code' => 'SWE1001121',
            'length' => 3,
            'price' => rand(10,100),
            'option' => Arr::random($option),
            'status' => 'approved',
            'description' => 'learn new skill and knowledge accompanied by the rich biodiversity and culture in Sarawak.',
            'thumbnail_path' => 'test.png',
            'training_document' => 'document.zip',
            'created_at' => '2021-04-22 12:53:34',
        ]);

        DB::table('programs')->insert([
            'name' => 'Program C',
            'slug' => Str::slug('Program C'),
            'type' => 'Presentation',
            'code' => 'SWE100111',
            'length' => 3,
            'price' => rand(10,100),
            'option' => Arr::random($option),
            'status' => 'approved',
            'description' => 'learn new skill and knowledge accompanied by the rich biodiversity and culture in Sarawak.',
            'thumbnail_path' => 'test.png',
            'training_document' => 'document.zip',
            'created_at' => '2021-04-22 12:53:34',
        ]);

        DB::table('programs')->insert([
            'name' => 'Program D',
            'slug' => Str::slug('Program D'),
            'type' => 'Presentation',
            'code' => 'SWE10',
            'length' => 3,
            'price' => rand(10,100),
            'option' => Arr::random($option),
            'status' => 'approved',
            'description' => 'This is a test',
            'thumbnail_path' => 'test.png',
            'training_document' => 'document.zip',
            'created_at' => '2021-04-22 12:53:34',
        ]);

        DB::table('programs')->insert([
            'name' => 'Program E',
            'slug' => Str::slug('Program E'),
            'type' => 'Presentation',
            'code' => 'CPS128371',
            'length' => 3,
            'price' => rand(10,100),
            'option' => Arr::random($option),
            'status' => 'approved',
            'description' => 'This is a test',
            'thumbnail_path' => 'test.png',
            'training_document' => 'document.zip',
            'created_at' => '2021-04-22 12:53:34',
        ]);
    }
}
