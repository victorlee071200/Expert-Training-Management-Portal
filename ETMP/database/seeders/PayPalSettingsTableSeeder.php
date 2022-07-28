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
            'paypal_smart_sandbox_client' => 'Aav98Vd4zmmduS9y3Nen8WrPTbn2lFjINHTtPSJh_eKd9q2Jf9wm1UYCL9TdX8h0mL1E6t0kKHM7WBcc',
            'paypal_smart_sandbox_secret' => 'EBCktRy153NOXHSezVCCaTJ0q-fWrLLjUJKFbBxu4lGElBNyBR0XrQwa6zObtC4Ccf1raC0NVP_HSzXm',
        ]);
    }
}
