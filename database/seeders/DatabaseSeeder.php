<?php

namespace Database\Seeders;

use App\Models\DataStore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DataStore::factory(10)->create();
        // DeliveryInformation::factory()->has(Order::factory())->count(20)->create();
        // Order::factory(10)->create()->each(function($order){
        //     $order->deliveries()->saveMany(DeliveryInformation::factory(3)->create(['order_code' => $order->order_code]));
        // });
    }
}
