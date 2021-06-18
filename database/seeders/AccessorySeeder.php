<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accessory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/data/accessorydata.json');
        DB::table('accessories')->delete();
        $data = json_decode($json_file);
        foreach ($data as $obj) {
            Accessory::create(array(
                'helmet' => $obj->helmet,
                'pedals' => $obj->pedals,
                'gloves' => $obj->gloves,
                'knee_pads' => $obj->knee_pads,
                'store_id' => $obj->store_id
            ));
        } 
    }
}