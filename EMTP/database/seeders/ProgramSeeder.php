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

        $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                    id est laborum.";

        DB::table('programs')->insert([
            'name' => 'Program A',
            'type' => 'Communication',
            'slug' => Str::slug('Program A'),
            'code' => 'ICT30005',
            'length' => 3,
            'price' => rand(10,100),
            'option' => 'online',
            'status' => 'approved',
            'description' => $content,
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
            'description' => 'This is a test',
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
            'description' => 'This is a test',
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
