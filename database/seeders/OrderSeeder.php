<?php

namespace Database\Seeders;

use App\Models\Order\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'customer_id' => 1,
            'orderStatus' => 'جاري معالجة الطلب',
            'totalPrice' => 500000

        ]);
        Order::create([
            'customer_id' => 2,
            'orderStatus' => 'جاري معالجة الطلب',
            'totalPrice' => 500000

        ]);
        Order::create([
            'customer_id' => 1,
            'orderStatus' => 'جاري معالجة الطلب',
            'totalPrice' => 500000

        ]);
        Order::create([
            'customer_id' => 1,
            'orderStatus' => 'جاري معالجة الطلب',
            'totalPrice' => 500000

        ]);

    }
}
