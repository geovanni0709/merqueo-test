<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class ProductSeeder
 */
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/product.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['products']) && is_array($contentData['products'])) {
            foreach ($contentData['products'] as $rowItem) {
                $newRowItem = [];
                foreach ($rowItem as $columnItem => $item) {
                    $newRowItem[$columnItem] = trim($item);
                }
                Product::create($newRowItem);
            }
        }
    }
}