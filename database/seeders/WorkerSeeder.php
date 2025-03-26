<?php

namespace Database\Seeders;

use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workers')->insert([
            'name' => 'worker',
            'second_name' => 'worker',
            'surname' => 'worker',
            'email' => 'worker@worker.com',
            'password' => bcrypt('worker'),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Worker::factory(100)->create();
    }
}
