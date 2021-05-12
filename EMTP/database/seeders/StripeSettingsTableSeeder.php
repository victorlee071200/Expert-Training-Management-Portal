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
            'stripe_test_publishable_key' => 'pk_test_51InY55GyWarx4gtO44SI2KPF89ZiAXuWczs005kvm8uRjUMyZ1Fv3SF2Q0CLhNmJUSrknF0XnZEvKgEJQ8u7odE900xumMMoPn',
            'stripe_test_secret_key' => 'sk_test_51InY55GyWarx4gtOvsBdK8W1WqvbBRNrPId41FGp2O4mHAevsuW6hBIzmqg4rAVJJUDMgl5iqzHxwTdEpNyRsdED00Q8q7Kz6B',
        ]);
    }
}
