<?php

namespace App\Http\Controllers;

use App\Models\DeliveryInformation;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with('deliveries')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request = $request->collect();

        // check if length of collection is more than one
        if($request->count() !== 1){
            return ["message" => "invalid request body length"];
        }

        foreach($request as $key => $value) {
            $order_code = $key;
            $data = $value;
        }

        $order = Order::firstOrCreate(['order_code' => $order_code]);
        $delivery = $order->deliveries()->create($data);

        return [
            $order->order_code => $delivery
        ];
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
    public function show(Order $order, Request $request)
    {
        if($request->has('timestamp')){
            return $order->deliveries()->where('timestamp', strtotime($request->timestamp))->first();
        }
        $last_delivery = $order->deliveries()->latest('timestamp')->first();
        return [
            $order->order_code => $last_delivery
        ];
    }

    /**
     * Return value by the given key and timestamp
     */

    function showByTimestamp(Order $order, Request $request){
        return $request->collect();
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
