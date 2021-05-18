<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_programs')->insert([
            'user_id'  => 3,
            'program_id'  => 1,
        ]);

        DB::table('user_programs')->insert([
            'user_id'  => 3,
            'program_id'  => 2,
        ]);

        DB::table('user_programs')->insert([
            'user_id'  => 3,
            'program_id'  => 3,
        ]);

        DB::table('user_programs')->insert([
            'user_id'  => 4,
            'program_id'  => 1,
        ]);

        DB::table('user_programs')->insert([
            'user_id'  => 4,
            'program_id'  => 2,
        ]);

        DB::table('user_programs')->insert([
            'user_id'  => 4,
            'program_id'  => 3,
        ]);
    }
}
