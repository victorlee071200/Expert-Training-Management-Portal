<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayPalSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pay_pal_settings')->insert([
            'paypal_smart_environment' => 'sandbox',
            'paypal_smart_sandbox_client' => 'AS0aPvWjYbPpGok0CXhwd0Nlt4p86acdwqvhI7PJQX5pUEbH48acZMQj-QSL98FDSjOmXrfHgQoM66YB',
            'paypal_smart_sandbox_secret' => 'EKUgu4E7lY724RI2CfoK-lr26aVIJp0ghvVF2JheDI7BZ4qyhONn-i7PBst-6OieckYDCepWO4Rhco0x',
        ]);
    }
}
