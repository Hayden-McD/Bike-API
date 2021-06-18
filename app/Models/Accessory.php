<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    protected $table = 'accessories';

    protected $fillable = ['helmet', 'pedals', 'gloves', 'knee_pads', 'store_id'];

    public function stores() {
        return $this->hasManyThrough(
            Store::class,
            Bike::class,
            'store_id',
            'bike_id',
            'id',
            'id');
    }
}