<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BraintreeSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('braintree_settings')->insert([
            'braintree_environment' => 'sandbox',
            'braintree_sandbox_merchant_id' => '822hyrt6ng5cmzdn',
            'braintree_sandbox_public_key' => '2c7kfw89sp55kgmn',
            'braintree_sandbox_private_key' => '09797ce41cdb4659ed4d73ca4c7b0f40',
        ]);
    }
}
