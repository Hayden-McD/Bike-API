<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Bike;
use Illuminate\Http\Request;
use Validator;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stores = Store::query();

        //query to search for stores in a specific city//
        if ($request->get('city')) {
            $stores->where('city', '=', $request->get('city'))->get();
        }
        //This function returns the fields from the stores and bikes table and sorts the bikes by how much stock they have
         return Store::with([ 'accessories', 'bikes' => function($sort) {
            $sort->orderBy('stock', 'asc');
        }])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_name' => 'required',
            'city' => 'required',
            'manager' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 403);
        } else {
            Store::create($request->all());
            return response()->json(['message' => 'Store added.'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stores = Store::query();
        if ($stores->where('id', $id)->exists()) {
            $store = $stores->where('id', $id)->get();
            return response($store, 200);
        } 
        
        else {
            return response()->json(['message' => 'Store not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stores = Store::query();
        if ($stores->where('id', $id)->exists()) {
            $store = $stores->find($id);
            $store->store_name = is_null($request->store_name) ? $store->store_name : $request->store_name;
            $store->city = is_null($request->city) ? $store->city : $request->city;
            $store->manager = is_null($request->manager) ? $store->manager : $request->manager;
            $store->save();
            
            return response()->json(['message' => 'Store updated.'], 200);
        } 
        
        else {
            return response()->json(['message' => 'Store not found.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = Store::query();
        if ($stores->where('id', $id)->exists()) {
            $store = $stores->find($id);
            $store->delete();
            return response()->json(['message' => 'Store deleted.'], 202);
        } 
        
        else {
            return response()->json(['message' => 'Store not found.'], 404);
        }
    }
}
