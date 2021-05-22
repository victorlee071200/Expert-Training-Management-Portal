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
        date_default_timezone_set("Asia/Kuala_Lumpur");

        DB::table('announcements')->insert([
            'program_id' => 1,
            'title' => 'Announcement 1',
            'content' => 'This coming week will be a tuition week. Hence, there\'ll be no virtual consultation during the week. Our session will resume back on Week 7 (19th April) onward',
            'state' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('announcements')->insert([
            'program_id' => 2,
            'title' => 'Announcement 1',
            'content' => 'Sharing with you on Agile project estimation across sprints',
            'state' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('announcements')->insert([
            'program_id' => 3,
            'title' => 'Announcement 1',
            'content' => 'Of course, you are required to watch the pre-recorded lecture and tutorial briefing. Jot down any questions or doubts and bring it up to me in our virtual consultation session (Microsoft Team).',
            'state' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('announcements')->insert([
            'program_id' => 1,
            'title' => 'Announcement 2',
            'content' => 'Sprint 2 review will be conducted on 17/5/2021 (Monday) during the lecture session. Kindly reserve your slot here',
            'state' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('announcements')->insert([
            'program_id' => 2,
            'title' => 'Announcement 2',
            'content' => 'Here comes Week 2. Sit back and have a watch on this video',
            'state' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('announcements')->insert([
            'program_id' => 3,
            'title' => 'Announcement 2',
            'content' => 'Here you go the recording for this afternoon virtual meetup, just in case you missed it',
            'state' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('announcements')->insert([
            'program_id' => 2,
            'title' => 'Announcement 3',
            'content' => 'Hope you all have a good start of the unit and see you all on Friday morning',
            'state' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
