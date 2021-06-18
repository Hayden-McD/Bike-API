<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bike;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/data/bikedata.json');
        DB::table('bikes')->delete();
        $data = json_decode($json_file);
        foreach ($data as $obj) {
            Bike::create(array(
                'make' => $obj->make,
                'model' => $obj->model,
                'category' => $obj->category,
                'stock' => $obj->stock,
                'store_id' => $obj->store_id,
            ));
        } 
    }
}
