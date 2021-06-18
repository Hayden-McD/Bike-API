<?php

namespace App\Http\Controllers;

use App\Models\bike;
use Illuminate\Http\Request;
use Validator;

class bikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bikes = Bike::query();
        //query to search for a specific bike make//
        if ($request->get('make')) {
            $bikes->where('make', '=', $request->get('make'))->get();
        }
        //query to search for a specific bike category//
        if ($request->get('category')) {
            $bikes->where('category', '=', $request->get('category'))->get();
        }
        return response($bikes->get(), 200);
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
     * bike a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'make' => 'required',
            'model' => 'required',
            'category' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 403);
        } else {
            Bike::create($request->all());
            return response()->json(['message' => 'Bike added.'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bikes = Bike::query();
        if ($bikes->where('id', $id)->exists()) {
            $bike = $bikes->where('id', $id)->get();
            return response($bike, 200);
        } 
        
        else {
            return response()->json(['message' => 'Bike not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(bike $bike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bikes = Bike::query();
        if ($bikes->where('id', $id)->exists()) {
            $bike = $bikes->find($id);
            $bike->model = is_null($request->model) ? $bike->model : $request->model;
            $bike->make = is_null($request->make) ? $bike->make : $request->make;
            $bike->category = is_null($request->category) ? $bike->category : $request->category;
            $bike->save();
            return response()->json(['message' => 'Bike updated.'], 200);
        }

        else {
                return response()->json(['message' => 'Bike not found.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bikes = Bike::query();
        if ($bikes->where('id', $id)->exists()) {
            $bike = $bikes->find($id);
            $bike->delete();
            return response()->json(['message' => 'Bike deleted.'], 202);
        } 
        
        else {
            return response()->json(['message' => 'Bike not found.'], 404);
        }
    }
}
