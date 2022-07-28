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
        $content = "May the Force be with you!";

        DB::table('client_programs')->insert([
            'client_email' => 'member@gmail.com',
            'company_name' => 'Techsim',
            'user_id' => 4,
            'program_id' => 1,
            'staff_id' => 3,
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
            'user_id' => 4,
            'program_id' => 2,
            'staff_id' => 3,
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
            'user_id' => 4,
            'program_id' => 3,
            'staff_id' => 3,
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
