<?php

use App\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class CustomerSeeder
 */
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/customer.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['customers']) && is_array($contentData['customers'])) {
            foreach ($contentData['customers'] as $rowItem) {
                $newRowItem = [];
                foreach ($rowItem as $columnItem => $item) {
                    $newRowItem[$columnItem] = trim($item);
                }
                Customer::create($newRowItem);
            }
        }
    }
}