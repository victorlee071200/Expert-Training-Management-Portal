<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProgramSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\DepartmentsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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
            ClientProgramTableSeeder::class,
            FeedbackSeeder::class,
            DepartmentsTableSeeder::class
        ]);
    }
}
