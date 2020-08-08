<?php

use App\ProviderProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class ProviderProductSeeder
 */
class ProviderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/provider_product.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['providers_products']) && is_array($contentData['providers_products'])) {
            foreach ($contentData['providers_products'] as $rowItem) {
                if (isset($rowItem['products']) && is_array($rowItem['products'])) {
                    $newRowItem = [];
                    $newRowItem['provider_id'] = (int)$rowItem['provider_id'];
                    foreach ($rowItem['products'] as $row) {
                        foreach ($row as $columnItem => $item) {
                            $newRowItem[$columnItem] = trim($item);
                        }
                        ProviderProduct::create($newRowItem);
                    }
                }
            }
        }
    }
}