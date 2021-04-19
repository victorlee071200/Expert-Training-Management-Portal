<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
Use App\Models\User;
Use App\Models\Program;
Use App\Models\ClientProgram;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $option = ['online','physical','both'];
        $clientoption = ['physical','online'];

        // User::factory()
        // ->count(10)
        // ->create();

        //client
        DB::table('users')->insert([
            'name' => 'Ali',
            'email_verified_at' => '2021-04-19 23:01:02',
            'email' => 'c@c',
            'password' => Hash::make('1234567890'),
            'usertype' => 'client',
        ]);

        //staff
        DB::table('users')->insert([
            'name' => 'Abu',
            'email_verified_at' => '2021-04-19 23:01:02',
            'email' => 's@s',
            'password' => Hash::make('1234567890'),
            'usertype' => 'staff',
        ]);

        //admin
        DB::table('users')->insert([
            'name' => 'JoJo',
            'email_verified_at' => '2021-04-19 23:01:02',
            'email' => 'a@a',
            'password' => Hash::make('1234567890'),
            'usertype' => 'admin',
        ]);

        DB::table('programs')->insert([
            'name' => 'Program A',
            'type' => 'Communication',
            'code' => 'ICT30005',
            'price' => rand(10,100),
            'option' => Arr::random($option),
            'status' => 'to-be-confirmed',
            'description' => 'This is a test',
            'thumbnail_path' => 'tanjiro.png',
        ]);

        DB::table('programs')->insert([
            'name' => 'Program B',
            'type' => 'Presentation',
            'code' => 'PCE10023',
            'price' => rand(10,100),
            'option' => Arr::random($option),
            'status' => 'approved',
            'description' => 'This is a test',
            'thumbnail_path' => 'tanjiro.png',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'c@c',
            'company_name' => Str::random(10),
            'program_id' => '1',
            'staff_id' => '2',
            'option' => Arr::random($clientoption),
            'client_venue' => Str::random(10),
            'no_of_employees' => rand(10,100),
            'payment_type' => 'cash',
            'payment_status' => 'pending',
            'start_date' => '2021-04-13',
            'end_date' => '2021-04-15',
            'client_notes' => Str::random(10),
            'status' => 'pending',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'c@c',
            'company_name' => Str::random(10),
            'program_id' => '2',
            'staff_id' => '2',
            'option' => Arr::random($clientoption),
            'client_venue' => Str::random(10),
            'no_of_employees' => rand(10,100),
            'payment_type' => 'cash',
            'payment_status' => 'pending',
            'start_date' => '2021-04-13',
            'end_date' => '2021-04-13',
            'client_notes' => Str::random(10),
            'status' => 'pending',
        ]);
    }
}
