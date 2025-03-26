<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTypeSeeder extends Seeder
{

    static $orderTypes = [
        'Погрузка/Разгрузка',
        'Такелажные работы',
        'Уборка'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$orderTypes as $orderType) {
            DB::table('order_types')->insert([
                'name' => $orderType,
            ]);
        }
    }
}
