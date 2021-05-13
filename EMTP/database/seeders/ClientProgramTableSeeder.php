<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientProgramTableSeeder extends Seeder
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

        DB::table('client_programs')->insert([
            'client_email' => 'member@gmail.com',
            'company_name' => 'Techsim',
            'user_id' => 3,
            'program_id' => 1,
            'staff_id' => 2,
            'option' => 'physical',
            'client_venue' => 'Viva City',
            'no_of_employees' => 50,
            'payment_type' => 'cash',
            'payment_status' => 'approved',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => '2021-05-28 12:53:34',
            'client_notes' => $content,
            'status' => 'approved',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'member@gmail.com',
            'company_name' => 'Techsim',
            'user_id' => 3,
            'program_id' => 2,
            'staff_id' => 2,
            'option' => 'physical',
            'client_venue' => 'City Two',
            'no_of_employees' => 30,
            'payment_type' => 'online banking',
            'payment_status' => 'approved',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => '2021-05-28 12:53:34',
            'client_notes' => $content,
            'status' => 'approved',
        ]);

        DB::table('client_programs')->insert([
            'client_email' => 'member@gmail.com',
            'company_name' => 'Techsim',
            'user_id' => 3,
            'program_id' => 3,
            'staff_id' => 2,
            'option' => 'physical',
            'client_venue' => 'City Two',
            'no_of_employees' => 30,
            'payment_type' => 'online banking',
            'payment_status' => 'approved',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => '2021-05-28 12:53:34',
            'client_notes' => $content,
            'status' => 'completed',
        ]);
    }
}
