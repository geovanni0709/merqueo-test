<?php

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class OrderSeeder
 */
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/order.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['orders']) && is_array($contentData['orders'])) {
            foreach ($contentData['orders'] as $rowItem) {
                $newRowItem = [];
                foreach ($rowItem as $columnItem => $item) {
                    $newRowItem[$columnItem] = trim($item);
                }
                Order::create($newRowItem);
            }
        }
    }
}