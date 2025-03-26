<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(OrderTypeSeeder::class);
        $this->call(PartnershipSeeder::class);
        $this->call(UserSeeder::class);

        $this->call([
            WorkerSeeder::class,
            OrderSeeder::class,
        ]);

        $this->call([
            OrderWorkerSeeder::class,
            WorkerExOrderTypeSeeder::class
        ]);
    }
}
