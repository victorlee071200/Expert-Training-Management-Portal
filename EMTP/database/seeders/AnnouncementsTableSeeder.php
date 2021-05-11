<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                    id est laborum.";

        DB::table('announcements')->insert([
            'program_code' => 'ICT30005',
            'program_name' => 'Program A',
            'title' => 'Announcement 1',
            'content' => $content,
            'state' => 'ACTIVE',
        ]);

        DB::table('announcements')->insert([
            'program_code' => 'PCE10023',
            'program_name' => 'Program B',
            'title' => 'Announcement 1',
            'content' => $content,
            'state' => 'ACTIVE',
        ]);

        DB::table('announcements')->insert([
            'program_code' => 'PCE10011',
            'program_name' => 'Program C',
            'title' => 'Announcement 1',
            'content' => $content,
            'state' => 'ACTIVE',
        ]);

        DB::table('announcements')->insert([
            'program_code' => 'ICT30005',
            'program_name' => 'Program A',
            'title' => 'Announcement 2',
            'content' => $content,
            'state' => 'ACTIVE',
        ]);

        DB::table('announcements')->insert([
            'program_code' => 'PCE10023',
            'program_name' => 'Program B',
            'title' => 'Announcement 2',
            'content' => $content,
            'state' => 'ACTIVE',
        ]);

        DB::table('announcements')->insert([
            'program_code' => 'PCE10011',
            'program_name' => 'Program C',
            'title' => 'Announcement 2',
            'content' => $content,
            'state' => 'ACTIVE',
        ]);

        DB::table('announcements')->insert([
            'program_code' => 'PCE10011',
            'program_name' => 'Program C',
            'title' => 'Announcement 3',
            'content' => $content,
            'state' => 'ACTIVE',
        ]);
    }
}
