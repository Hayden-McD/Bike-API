<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;
use Validator;

class accessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accessories = Accessory::query();

        if ($request->get('helmet')) {
            $accessories->where('helmet', '=', $request->get('helmet'))->get();
        }
        //query to search for a specific set of pedals//
        if ($request->get('pedals')) {
            $accessories->where('pedals', '=', $request->get('pedals'))->get();
        }
        //query to search for a specific pair of gloves//
        if ($request->get('gloves')) {
            $accessories->where('gloves', '=', $request->get('gloves'))->get();
        }
        //query to search for a specific pair of knee pads//
        if ($request->get('knee_pads')) {
            $accessories->where('knee_pads', '=', $request->get('knee_pads'))->get();
        }
        return response($accessories->get(), 200);
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
     * accessory a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'helmet' => 'required',
            'pedals' => 'required',
            'gloves' => 'required',
            'knee_pads' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 403);
        } else {
            Accessory::create($request->all());
            return response()->json(['message' => 'Accessories added.'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accessories = Accessory::query();
        if ($accessories->where('id', $id)->exists()) {
            $accessory = $accessories->where('id', $id)->get();
            return response($accessory, 200);
        } 
        
        else {
            return response()->json(['message' => 'Accessories not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessory $accessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accessories = Accessory::query();
        if ($accessories->where('id', $id)->exists()) {
            $accessory = $accessories->find($id);
            $accessory->helmet = is_null($request->helmet) ? $accessory->helmet : $request->helmet;
            $accessory->pedals = is_null($request->pedals) ? $accessory->pedals : $request->pedals;
            $accessory->gloves = is_null($request->gloves) ? $accessory->gloves : $request->gloves;
            $accessory->knee_pads = is_null($request->knee_pads) ? $accessory->knee_pads : $request->knee_pads;
            $accessory->save();
            return response()->json(['message' => 'Accessories updated.'], 200);
        }

        else {
                return response()->json(['message' => 'Accessories not found.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessories = Accessory::query();
        if ($accessories->where('id', $id)->exists()) {
            $accessory = $accessories->find($id);
            $accessory->delete();
            return response()->json(['message' => 'Accessories deleted.'], 202);
        } 
        
        else {
            return response()->json(['message' => 'Accessories not found.'], 404);
        }
    }
}
