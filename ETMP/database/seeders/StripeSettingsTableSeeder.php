<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StripeSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stripe_settings')->insert([
            'stripe_environment' => 'test',
            'stripe_test_publishable_key' => 'pk_test_51LIPRQJK5OgI8SILF4xxBusvKm2UvOnVCRL0tF7diHrQZXRc8XdzZOSSjvLgRs8kXtCMZIVcMwQpQ3JCmR1khLmx0067VDIXWH',
            'stripe_test_secret_key' => 'sk_test_51LIPRQJK5OgI8SILMosfBdS0XYwbFiPM8UEKao5kZyl3NdmHde338NY7Fhemv98jEVQZD9F7dqcCjaj2XVWwXSUP00jCelaMci',
        ]);
    }
}
