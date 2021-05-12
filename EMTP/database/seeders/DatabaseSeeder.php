<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProgramSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // User::factory()
        // ->count(10)
        // ->create();

        //client

        // //client
        // DB::table('users')->insert([
        //     'name' => 'Ali',
        //     'company_name' => 'Techsim',
        //     'email_verified_at' => '2021-04-19 23:01:02',
        //     'email' => 'c@c',
        //     'password' => Hash::make('1234567890'),
        //     'usertype' => 'client',
        // ]);

        // //staff
        // DB::table('users')->insert([
        //     'name' => 'Abu',
        //     'email_verified_at' => '2021-04-19 23:01:02',
        //     'email' => 's@s',
        //     'password' => Hash::make('1234567890'),
        //     'usertype' => 'staff',
        // ]);

        // //admin
        // DB::table('users')->insert([
        //     'name' => 'JoJo',
        //     'email_verified_at' => '2021-04-19 23:01:02',
        //     'email' => 'a@a',
        //     'password' => Hash::make('1234567890'),
        //     'usertype' => 'admin',
        // ]);

        

        // DB::table('client_programs')->insert([
        //     'client_email' => 'c@c',
        //     'company_name' => 'Techsim',
        //     'program_id' => '1',
        //     'staff_id' => '2',
        //     'option' => 'online',
        //     'client_venue' => 'Online',
        //     'no_of_employees' => rand(10,100),
        //     'payment_type' => 'cash',
        //     'payment_status' => 'pending',
        //     'start_date' => '2021-04-13',
        //     'end_date' => '2021-04-15',
        //     'client_notes' => 'This is client note',
        //     'status' => 'pending',
        // ]);

        // DB::table('programs')->insert([
        //     'name' => 'Program B',
        //     'type' => 'Presentation',
        //     'code' => 'PCE10023',
        //     'length' => 3,
        //     'price' => rand(10,100),
        //     'option' => 'online',
        //     'status' => 'approved',
        //     'description' => $content,
        //     'thumbnail_path' => 'test.png',
        //     'created_at' => '2021-04-22 12:53:34',
        // ]);

        // DB::table('programs')->insert([
        //     'name' => 'Program C',
        //     'type' => 'Presentation',
        //     'code' => 'PCE10011',
        //     'length' => 3,
        //     'price' => rand(10,100),
        //     'option' => 'physical',
        //     'status' => 'approved',
        //     'description' => $content,
        //     'thumbnail_path' => 'test.png',
        //     'created_at' => '2021-04-22 12:53:34',
        // ]);

        // DB::table('client_programs')->insert([
        //     'client_email' => 'c@c',
        //     'company_name' => 'Techsim',
        //     'program_id' => '1',
        //     'staff_id' => '2',
        //     'option' => 'online',
        //     'client_venue' => 'Online',
        //     'no_of_employees' => rand(10,100),
        //     'payment_type' => 'cash',
        //     'payment_status' => 'pending',
        //     'start_date' => '2021-04-13',
        //     'end_date' => '2021-04-15',
        //     'client_notes' => 'This is client note',
        //     'status' => 'approved',
        // ]);

        // DB::table('client_programs')->insert([
        //     'client_email' => 'e@c',
        //     'company_name' => 'Company E',
        //     'program_id' => '3',
        //     'staff_id' => '2',
        //     'option' => 'physical',
        //     'client_venue' => 'CityOne',
        //     'no_of_employees' => rand(10,100),
        //     'payment_type' => 'cash',
        //     'payment_status' => 'pending',
        //     'start_date' => '2021-04-13',
        //     'end_date' => '2021-04-15',
        //     'client_notes' => 'This is client note',
        //     'status' => 'approved',
        // ]);

        // DB::table('client_programs')->insert([
        //     'client_email' => 'x@x',
        //     'company_name' => 'Company G',
        //     'program_id' => '2',
        //     'staff_id' => '2',
        //     'option' => 'online',
        //     'client_venue' => 'Online',
        //     'no_of_employees' => rand(10,100),
        //     'payment_type' => 'cash',
        //     'payment_status' => 'pending',
        //     'start_date' => '2021-04-13',
        //     'end_date' => '2021-04-15',
        //     'client_notes' => 'This is client note',
        //     'status' => 'approved',
        // ]);
        // DB::table('client_programs')->insert([
        //     'client_email' => 'c@c',
        //     'company_name' => 'Techsim',
        //     'program_id' => '4',
        //     'staff_id' => '2',
        //     'option' => 'physical',
        //     'client_venue' => 'Viva City',
        //     'no_of_employees' => rand(10,100),
        //     'payment_type' => 'cash',
        //     'payment_status' => 'approved',
        //     'start_date' => '2021-04-13',
        //     'end_date' => '2021-04-13',
        //     'client_notes' => 'This is client note',
        //     'status' => 'completed',
        // ]);

        // DB::table('materials')->insert([
        //     'program_code' => 'ICT30005',
        //     'program_name' => 'Program A',
        //     'title' => 'Introduction',
        //     'content' => $content,
        //     'state' => 'ACTIVE',
        // ]);

        // DB::table('client_programs')->insert([
        //     'client_email' => 'companyb@gmail.com',
        //     'company_name' => 'Company B',
        //     'program_id' => '1',
        //     'staff_id' => '3',
        //     'option' => Arr::random($clientoption),
        //     'client_venue' => 'Viva City',
        //     'no_of_employees' => rand(10,100),
        //     'payment_type' => 'cash',
        //     'payment_status' => 'pending',
        //     'start_date' => '2021-04-13',
        //     'end_date' => '2021-04-15',
        //     'client_notes' => 'This is client note',
        //     'status' => 'to-be-confirmed',
        // ]);

        // DB::table('client_programs')->insert([
        //     'client_email' => 'c@c',
        //     'company_name' => 'Techsim',
        //     'program_id' => '3',
        //     'staff_id' => '2',
        //     'option' => 'physical',
        //     'client_venue' => 'Viva City',
        //     'no_of_employees' => rand(10,100),
        //     'payment_type' => 'cash',
        //     'payment_status' => 'pending',
        //     'start_date' => '2021-04-13',
        //     'end_date' => '2021-04-13',
        //     'client_notes' => 'This is client note',
        //     'status' => 'approved',
        // ]);

        // DB::table('materials')->insert([
        //     'program_code' => 'ICT30005',
        //     'program_name' => 'Program A',
        //     'title' => 'Introduction',
        //     'content' => $content,
        //     'state' => 'ACTIVE',
        // ]);

        // DB::table('materials')->insert([
        //     'program_code' => 'PCE10023',
        //     'program_name' => 'Program B',
        //     'title' => 'Introduction',
        //     'content' => $content,
        //     'state' => 'ACTIVE',
        // ]);

        // DB::table('materials')->insert([
        //     'program_code' => 'PCE10011',
        //     'program_name' => 'Program C',
        //     'title' => 'Introduction',
        //     'content' => $content,
        //     'state' => 'ACTIVE',
        // ]);

        // DB::table('materials')->insert([
        //     'program_code' => 'ICT30005',
        //     'program_name' => 'Program A',
        //     'title' => 'Chapter 1',
        //     'content' => $content,
        //     'state' => 'ACTIVE',
        // ]);

        // DB::table('materials')->insert([
        //     'program_code' => 'PCE10011',
        //     'program_name' => 'Program C',
        //     'title' => 'Chapter 1',
        //     'content' => $content,
        //     'state' => 'ACTIVE',
        // ]);

        // DB::table('materials')->insert([
        //     'program_code' => 'PCE10011',
        //     'program_name' => 'Program C',
        //     'title' => 'Chapter 2',
        //     'content' => $content,
        //     'state' => 'ACTIVE',
        // ]);




        // $this->call(UserSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(RoleUserSeeder::class);

        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            CurrenciesTableSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CoursesTableSeeder::class,
            UserProgramsTableSeeder::class,
            OrdersTableSeeder::class,
            SettingsTableSeeder::class,
            BraintreeSettingsTableSeeder::class,
            StripeSettingsTableSeeder::class,
            PayPalSettingsTableSeeder::class,
            AnnouncementsTableSeeder::class,
            ProgramSeeder::class,
        ]);

        // DB::table('feedbacks')->insert([
        //     'client_id' => 1,
        //     'client_name' => "Techsim",
        //     'profile_thumbnail'=>"profile.jpg",
        //     'program_id' => 3,
        //     'feedback' => 'This program is awesome!',
        //     'image_path' => 'test.png',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('feedbacks')->insert([
        //     'client_id' => 2,
        //     'client_name' => "Alibaba",
        //     'profile_thumbnail'=>"profile.jpg",
        //     'program_id' => 3,
        //     'feedback' => 'This program is awesome too!',
        //     'image_path' => 'test.png',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('feedbacks')->insert([
        //     'client_id' => 2,
        //     'client_name' => "Alibaba",
        //     'profile_thumbnail'=>"profile.jpg",
        //     'program_id' => 4,
        //     'feedback' => 'This program is awesome too!',
        //     'image_path' => 'test.png',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('feedbacks')->insert([
        //     'client_id' => 1,
        //     'client_name' => "Techsim",
        //     'profile_thumbnail'=>"profile.jpg",
        //     'program_id' => 4,
        //     'feedback' => 'This program is awesome!',
        //     'image_path' => 'test.png',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
    }
}
