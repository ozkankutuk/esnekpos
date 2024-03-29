<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Service::create([
            'name' => "membership",
            'price' => '342.23',
            'tax' => '0.18',
            'period' => 1
        ]);
    }
}
