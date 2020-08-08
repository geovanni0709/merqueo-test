<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(ProductSeeder::class);
        $this->call(ProviderSeeder::class);
        $this->call(InventorySeeder::class);
        $this->call(ProviderProductSeeder::class);*/
        $this->call(CustomerSeeder::class);
        $this->call(CustomerAddressSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);
    }
}