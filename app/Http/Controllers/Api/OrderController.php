<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return new OrderCollection(Order::all());

    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
        $order = Order::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Meal stored Succesfully',
            'order' => $order
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        return new OrderResource($order);

    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();
        return response()->json([
            'status' => 'success',
            'message' => "Order Delete"]);
    }
}
