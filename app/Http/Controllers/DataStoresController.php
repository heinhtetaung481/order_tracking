<?php

namespace App\Http\Controllers;

use App\Models\DeliveryInformation;
use Illuminate\Http\Request;
use App\Models\DataStore;

class DataStoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataStore::all('key', 'value', 'timestamp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            $timestamp = time();
            $data_store = DataStore::updateOrCreate([
                "key" => $key,
            ],[
                "value" => $value,
                "timestamp" => $timestamp
            ]);
            return $data_store;
        }
        // check if length of collection is more than one
        // if($request->count() !== 1){
        //     return ["message" => "invalid request body length"];
        // }

        // foreach($request as $key => $value) {
        //     $order_code = $key;
        //     $data = $value;
        // }

        // $order = Order::firstOrCreate(['order_code' => $order_code]);
        // $delivery = $order->deliveries()->create($data);

        // return [
        //     $order->order_code => $delivery
        // ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $object = DataStore::where('key', $request->key)->first();
        if($request->has('timestamp')){
            $object = $object->versions->where('timestamp', $request->timestamp)->first();
        }
        return [
            "value" => $object->value
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
