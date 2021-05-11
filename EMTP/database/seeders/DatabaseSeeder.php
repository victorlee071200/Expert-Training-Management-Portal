<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Program;
use App\Models\ClientProgram;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $option = ['online', 'physical', 'both'];
        $clientoption = ['physical', 'online'];

        // User::factory()
        // ->count(10)
        // ->create();

        //client
        DB::table('users')->insert([
            'name' => 'Ali',
            'company_name' => 'Techsim',
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
            'length' => 3,
            'price' => rand(10, 100),
            'option' => Arr::random($option),
            'status' => 'to-be-confirmed',
            'description' => 'This is a test',
            'thumbnail_path' => 'test.png',
            'created_at' => '2021-04-22 12:53:34',
        ]);

        DB::table('programs')->insert([
            'name' => 'Program B',
            'type' => 'Presentation',
            'code' => 'PCE10023',
            'length' => 3,
            'price' => rand(10, 100),
            'option' => Arr::random($option),
            'status' => 'approved',
            'description' => 'This is a test',
            'thumbnail_path' => 'test.png',
            'created_at' => '2021-04-22 12:53:34',
        ]);

        DB::table('programs')->insert([
            'name' => 'Program C',
            'type' => 'Presentation',
            'code' => 'PCE10011',
            'length' => 3,
            'price' => rand(10, 100),
            'option' => Arr::random($option),
            'status' => 'approved',
            'description' => 'This is a test',
            'thumbnail_path' => 'test.png',
            'created_at' => '2021-04-22 12:53:34',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'c@c',
            'company_name' => 'Techsim',
            'program_id' => '1',
            'staff_id' => '2',
            'option' => 'online',
            'client_venue' => 'Online',
            'no_of_employees' => rand(10, 100),
            'payment_type' => 'cash',
            'payment_status' => 'pending',
            'start_date' => '2021-04-13',
            'end_date' => '2021-04-15',
            'client_notes' => 'This is client note',
            'status' => 'pending',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'e@c',
            'company_name' => 'Company E',
            'program_id' => '3',
            'staff_id' => '2',
            'option' => 'online',
            'client_venue' => 'Online',
            'no_of_employees' => rand(10, 100),
            'payment_type' => 'cash',
            'payment_status' => 'pending',
            'start_date' => '2021-04-13',
            'end_date' => '2021-04-15',
            'client_notes' => 'This is client note',
            'status' => 'pending',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'x@x',
            'company_name' => 'Company G',
            'program_id' => '2',
            'staff_id' => '2',
            'option' => 'online',
            'client_venue' => 'Online',
            'no_of_employees' => rand(10, 100),
            'payment_type' => 'cash',
            'payment_status' => 'pending',
            'start_date' => '2021-04-13',
            'end_date' => '2021-04-15',
            'client_notes' => 'This is client note',
            'status' => 'approved',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'companyb@gmail.com',
            'company_name' => 'Company B',
            'program_id' => '1',
            'staff_id' => '3',
            'option' => Arr::random($clientoption),
            'client_venue' => 'Viva City',
            'no_of_employees' => rand(10, 100),
            'payment_type' => 'cash',
            'payment_status' => 'pending',
            'start_date' => '2021-04-13',
            'end_date' => '2021-04-15',
            'client_notes' => 'This is client note',
            'status' => 'to-be-confirmed',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'c@c',
            'company_name' => 'Techsim',
            'program_id' => '3',
            'staff_id' => '2',
            'option' => 'physical',
            'client_venue' => 'Viva City',
            'no_of_employees' => rand(10, 100),
            'payment_type' => 'cash',
            'payment_status' => 'pending',
            'start_date' => '2021-04-13',
            'end_date' => '2021-04-13',
            'client_notes' => 'This is client note',
            'status' => 'to-be-confirmed',
        ]);

        DB::table('help_questions')->insert([
            'title' => 'testing',
            'description' => 'testing',
            'content' => 'testing',
            'email' => 'admin@gmail.com',
        ]);
    }
}
