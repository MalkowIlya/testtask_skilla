<?php

namespace Database\Seeders;

use App\Models\OrderWorker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderWorkerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderWorker::factory(400)->create();
    }
}
