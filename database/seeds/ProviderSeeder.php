<?php

use App\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * class ProviderSeeder
 */
class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get('database/data/provider.json');
        $contentData = json_decode($jsonFile, true);

        if (isset($contentData['providers']) && is_array($contentData['providers'])) {
            foreach ($contentData['providers'] as $rowItem) {
                $newRowItem = [];
                foreach ($rowItem as $columnItem => $item) {
                    $newRowItem[$columnItem] = trim($item);
                }
                Provider::create($newRowItem);
            }
        }
    }
}