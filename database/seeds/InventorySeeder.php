<?php

use App\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class InventorySeeder
 */
class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/inventory.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['inventory']) && is_array($contentData['inventory'])) {
            foreach ($contentData['inventory'] as $rowItem) {
                $newRowItem = [];
                foreach ($rowItem as $columnItem => $item) {
                    $newRowItem[$columnItem] = trim($item);
                }
                Inventory::create($newRowItem);
            }
        }
    }
}