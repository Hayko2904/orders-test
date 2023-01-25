<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\Models\Order;

class OrderSeeder extends Seeder
{
    private $data = [
        [
            'product_name' => 'Order 1',
            'weight' => 10,
            'decription' => 'test 1',
            'total_price' => 100,
        ],
        [
            'product_name' => 'Order 2',
            'weight' => 20,
            'decription' => 'test 2',
            'total_price' => 200,
        ],
        [
            'product_name' => 'Order 3',
            'weight' => 30,
            'decription' => 'test 3',
            'total_price' => 300,
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::query()->insert($this->data);
    }
}
