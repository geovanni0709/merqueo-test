<?php

use App\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class OrderItemSeeder
 */
class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/order_item.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['orders_items']) && is_array($contentData['orders_items'])) {
            foreach ($contentData['orders_items'] as $rowItem) {
                if (isset($rowItem['items']) && is_array($rowItem['items'])) {
                    $newRowItem = [];
                    $newRowItem['order_id'] = (int)$rowItem['order_id'];
                    foreach ($rowItem['items'] as $row) {
                        foreach ($row as $columnItem => $item) {
                            $newRowItem[$columnItem] = trim($item);
                        }
                        OrderItem::create($newRowItem);
                    }
                }
            }
        }
    }
}