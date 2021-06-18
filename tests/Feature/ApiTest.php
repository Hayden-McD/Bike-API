<?php

namespace Tests\Feature;

use App\Models\Store;
use App\Models\Accessory;
use App\Models\Bike;
//use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    //Post
    public function testPOSTStore()
    {
        $payload = [
            'store_name' => "Make Test Store",
            'city' => "Make Test City",
            'manager' => "Make Test Manager"
        ];

        $response = $this->json('POST', '/api/stores', $payload);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Store added.'
            ]);
    }

    public function testPOSTbike()
    {
        $payload = [
            'make' => "Make Test bike",
            'model' => "Make Test model",
            'category' => "Make Test category",
            'stock' => "1",
            'store_id' => "1"
        ];

        $response = $this->json('POST', '/api/bikes', $payload);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Bike added.'
            ]);
    }

    public function testPOSTaccessory()
    {
        $payload = [
            'helmet' => "helmet Test accessory",
            'pedals' => "helmet Test pedals",
            'gloves' => "helmet Test gloves",
            'knee_pads' => '1',
            'store_id' =>3 ,
        ];

        $response = $this->json('POST','/api/accessories', $payload);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Accessories added.'
            ]);
    }

    //Update
    public function testUpdateStores()
    {
        $payload = [
            'store_name' => "Edited Test Store",
            'city' => "Edited Test City",
            'manager' => "Edited Test Manager"
        ];

        $response = $this->put('/api/stores/1', $payload);
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Store updated.'
            ]);
    }

    public function testUpdatebikes()
    {
        $payload = [
            'make' => "Edited Test bike",
            'model' => "Edited Test model",
            'category' => "Edited Test category",
            'stock' => "2",
            'store_id' => 3
        ];

        $response = $this->put('/api/bikes/1', $payload);
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Bike updated.'
            ]);
    }

    public function testUpdateaccessories()
    {
        $payload = [
            'helmet' => "Edited Test accessory",
            'pedals' => "Edited Test pedals",
            'gloves' => "Edited Test gloves",
            'knee_pads' => "2",
            'store_id' => 3,
        ];

        $response = $this->put('/api/accessories/1', $payload);
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Accessories updated.'
            ]);
    }

    //Get all
    public function testGETStores()
    {
        $response = $this->get('/api/stores');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'store_name',
                        'city',
                        'manager'
                    ]
                ]
            );
    }

    public function testGETbikes()
    {
        $response = $this->get('/api/bikes');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'make',
                        'model',
                        'category',
                        'stock',
                        'store_id'
                    ]
                ]
            );
    }

    public function testGETaccessories()
    {
        $response = $this->get('/api/accessories');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'helmet',
                        'pedals',
                        'gloves',
                        'knee_pads',
                        'store_id'
                    ]
                ]
            );
    }

    //Get
    public function testGETStore()
    {
        $response = $this->get('/api/stores/1');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                     [
                        'id',
                        'store_name',
                        'city',
                        'manager'
                    ]
                ]
            );
    }

    public function testGETbike()
    {
        $response = $this->get('/api/bikes/1');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'make',
                        'model',
                        'category',
                        'stock',
                        'store_id'
                    ]
                ]
            );
    }

    public function testGETaccessory()
    {
        $response = $this->get('/api/accessories/1');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'helmet',
                        'pedals',
                        'gloves',
                        'knee_pads',
                        'store_id'
                    ]
                ]
            );
    }

    //Delete
    public function testDELETEStore()
    {
        $response = $this->delete('/api/stores/1');
        $response
            ->assertStatus(202)
            ->assertJson([
                "message" => "Store deleted."
            ]);
    }

    public function testDELETEbike()
    {
        $response = $this->delete('/api/bikes/1');
        $response
            ->assertStatus(202)
            ->assertJson([
                "message" => "Bike deleted."
            ]);
    }

    public function testDELETEaccessory()
    {
        $response = $this->delete('/api/accessories/1');
        $response
            ->assertStatus(202)
            ->assertJson([
                "message" => "Accessories deleted."
            ]);
    }
    
    //Delete not found
    public function testDELETEStoreNotFound()
    {
        $response = $this->delete('/api/stores/500');
        $response
            ->assertStatus(404)
            ->assertJson([
                "message" => "Store not found."
            ]);
        } 
    
        public function testDELETEbikeNotFound()
        {
            $response = $this->delete('/api/bikes/500');
            $response
                ->assertStatus(404)
                ->assertJson([
                    "message" => "Bike not found."
                ]);
        }

        public function testDELETEaccessoryNotFound()
        {
            $response = $this->delete('/api/accessories/500');
            $response
                ->assertStatus(404)
                ->assertJson([
                    "message" => "Accessories not found."
                ]);
        }
}