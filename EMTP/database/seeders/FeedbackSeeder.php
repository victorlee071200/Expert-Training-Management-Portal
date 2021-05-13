<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert([
            'client_id' => 100,
            'client_name' => "Techsim",
            'profile_thumbnail'=>"profile.jpg",
            'program_id' => 1,
            'feedback' => 'This program is awesome!',
            'image_path' => 'test.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('feedbacks')->insert([
            'client_id' => 100,
            'client_name' => "Alibaba",
            'profile_thumbnail'=>"profile.jpg",
            'program_id' => 1,
            'feedback' => 'This program is awesome too!',
            'image_path' => 'test.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('feedbacks')->insert([
            'client_id' => 100,
            'client_name' => "Alibaba",
            'profile_thumbnail'=>"profile.jpg",
            'program_id' => 2,
            'feedback' => 'This program is awesome too!',
            'image_path' => 'test.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('feedbacks')->insert([
            'client_id' => 100,
            'client_name' => "Techsim",
            'profile_thumbnail'=>"profile.jpg",
            'program_id' => 2,
            'feedback' => 'This program is awesome!',
            'image_path' => 'test.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
