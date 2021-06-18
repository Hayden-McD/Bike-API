<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $table = 'bikes';

    protected $fillable = ['make', 'model', 'category', 'stock', 'store_id'];


    public function stores() {
        return $this->hasManyThrough(
            Store::class,
            Accessory::class,
            'accessory_id',
            'store_id',
            'id',
            'id');
    }
}