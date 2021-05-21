<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
            'name' => 'Page cannot be loaded',
            'description'  => 'Page cannot be loaded Description',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Department::insert([
            'name' => 'Cannot register program',
            'description'  => 'Cannot register program Description',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Department::insert([
            'name' => 'Feedback form not available',
            'description'  => 'Feedback form not available Description',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Department::insert([
            'name' => 'Payment not accepted/error',
            'description'  => 'Payment not accepted/error Description',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
