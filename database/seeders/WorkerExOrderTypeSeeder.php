<?php

namespace Database\Seeders;

use App\Models\WorkerExOrderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerExOrderTypeSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkerExOrderType::factory(50)->create();
    }
}
