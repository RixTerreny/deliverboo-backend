<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $orders=[
            'ord_1' => [
                'date' => '2023-03-02 17:54:28', 
                'total' => '23', 
                'customer_delivery_address' => 'Via Garibaldi 37', 
                'customer_phone' => '3894598709',
                'customer_name' => 'Mario',
                'customer_lastname' => 'Draghi'
            ],
            'ord_2' => [
                'date' => '2023-03-02 17:24:28', 
                'total' => '53', 
                'customer_delivery_address' => 'Via Motta 127', 
                'customer_phone' => '3894448709',
                'customer_name' => 'Valerio',
                'customer_lastname' => 'Bianchi'
            ],
        ];
        foreach ($orders as $order) {
            Order::create([
                'date' => $order['date'],
                'total' => $order['total'],
                'customer_delivery_address' => $order['customer_delivery_address'],
                'customer_phone' => $order['customer_phone'],
                'customer_name' => $order['customer_name'],
                'customer_lastname' => $order['customer_lastname']
            ]);
        }
    }
}