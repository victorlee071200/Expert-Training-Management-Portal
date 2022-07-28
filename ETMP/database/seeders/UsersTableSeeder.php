<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin user
        User::insert([
            'name' => 'admin',
            'role_id'  => '1',
            'company_name' => 'EMTP',
            'email'  => 'admin@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        // Admin user
        DB::table('users')->insert([
            'name' => 'kokwei',
            'role_id'  => '1',
            'company_name' => 'Techsim',
            'email'  => 'kokwei325@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        // staff
        User::insert([
            'name' => 'Technical Support 0',
            'email'  => 'staff@gmail.com',
            'company_name' => 'EMTP',
            'department' => 'Technical Support',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'role_id'  => '3',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        User::insert([
            'name' => 'client',
            'role_id'  => '2',
            'company_name' => 'Celcom',
            'email'  => 'member@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        // Member users
        User::insert([
            'name' => 'Technical Support 1',
            'email'  => 'technicalsupport@gmail.com',
            'company_name' => 'EMTP',
            'department' => 'Technical Support',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'role_id'  => '3',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        User::insert([
            'name' => 'Customer Service 1',
            'email'  => 'customerservice@gmail.com',
            'company_name' => 'EMTP',
            'department' => 'Customer Service',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'role_id'  => '3',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        User::insert([
            'name' => 'Billing 1',
            'email'  => 'billing@gmail.com',
            'company_name' => 'EMTP',
            'department' => 'Billing',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'role_id'  => '3',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        User::insert([
            'name' => 'Feedback 1',
            'email'  => 'feedback@gmail.com',
            'company_name' => 'EMTP',
            'department' => 'Feedback',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'role_id'  => '3',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);


    }
}
