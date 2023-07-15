<?php

namespace App\Http\Controllers\Api;

use App\Models\Meal;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealCollection;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return new MealCollection(Meal::all());
        //Display with more information about page
        // return MealResource::collection(Meal::paginate(1));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMealRequest $request)
    {
        //
        $meal = Meal::create($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Meal stored Succesfully',
            'meal' => $meal
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        //
        return new MealResource($meal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMealRequest $request, Meal $meal)
    {
        //
        $meal->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Meal updated',
            'meal' => $meal

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        //
        $meal->delete();
        return response()->json([
            'status' => 'success',
            'message' => "Meal Delete"]);
    }
}
