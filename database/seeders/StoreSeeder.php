<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $json_file = File::get('database/data/storedata.json');
    DB::table('stores')->delete();
    $data = json_decode($json_file);
    foreach ($data as $obj) {
        Store::create(array(
            'store_name' => $obj->store_name,
            'city' => $obj->city,
            'manager' => $obj->manager
        ));
    } 
    }
}