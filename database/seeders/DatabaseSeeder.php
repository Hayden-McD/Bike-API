<?php

namespace Database\Seeders;

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
        $this->call(StoreSeeder::class);
        $this->call(AccessorySeeder::class);
        $this->call(BikeSeeder::class);
    }
}
