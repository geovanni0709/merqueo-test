<?php

use App\CustomerAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class CustomerAddressSeeder
 */
class CustomerAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/customer_address.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['customers_addresses']) && is_array($contentData['customers_addresses'])) {
            foreach ($contentData['customers_addresses'] as $rowItem) {
                if (isset($rowItem['addresses']) && is_array($rowItem['addresses'])) {
                    $newRowItem = [];
                    $newRowItem['customer_id'] = (int)$rowItem['customer_id'];
                    foreach ($rowItem['addresses'] as $row) {
                        foreach ($row as $columnItem => $item) {
                            $newRowItem[$columnItem] = trim($item);
                        }
                        CustomerAddress::create($newRowItem);
                    }
                }
            }
        }
    }
}