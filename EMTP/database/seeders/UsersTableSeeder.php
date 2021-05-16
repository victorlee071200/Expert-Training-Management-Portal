<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'name' => 'admin',
            'role_id'  => '1',
            'company_name' => 'EMTP Sdn Bhd',
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
        DB::table('users')->insert([
            'name' => 'staff1',
            'role_id'  => '3',
            'company_name' => 'Techslim',
            'email'  => 'staff@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        // Member users
        DB::table('users')->insert([
            'name' => 'users1',
            'role_id'  => '2',
            'email'  => 'member@gmail.com',
            'company_name' => 'Techs123im',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'users2',
            'role_id'  => '2',
            'company_name' => 'asdasda',
            'email'  => 'newmember@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'users3',
            'role_id'  => '2',
            'company_name' => 'Tec1231hsim',
            'email'  => 'verynewmember@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'users4',
            'role_id'  => '2',
            'company_name' => 'Te123121chsim',
            'email'  => 'ultranewmember@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'users5',
            'role_id'  => '2',
            'company_name' => 'Techs1231231im',
            'email'  => 'supernewmember@gmail.com',
            'email_verified_at'  => date("Y-m-d H:i:s"),
            'password'  => bcrypt('12341234'),
            'profile_photo_path' => 'profile.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
        ]);

    }
}
