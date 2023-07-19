<?php

namespace App\Http\Controllers\Api;

use App\Models\File_Meal;
use App\Http\Resources\MealResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileMealResource;
use App\Http\Resources\FileMealCollection;
use App\Http\Requests\StoreFile_MealRequest;
use App\Http\Requests\UpdateFile_MealRequest;

class FileMealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return new FileMealCollection(File_Meal::all());

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFile_MealRequest $request)
    {
        //
        $file_meal = File_Meal::create($request->validated());

        $file_name1 = time() .'.'. request()->pic1->getClientOriginalExtension();
        request()->pic1->move(public_path('images'), $file_name1);

        $file_name2 = time() .'.'. request()->pic2->getClientOriginalExtension();
        request()->pic2->move(public_path('images'), $file_name2);

        $file_name3 = time() .'.'. request()->pic3->getClientOriginalExtension();
        request()->pic3->move(public_path('images'), $file_name3);

        $file_name4 = time() .'.'. request()->pic4->getClientOriginalExtension();
        request()->pic4->move(public_path('images'), $file_name4);

        $file_meal->pic1 = $file_name1;
        $file_meal->pic2 = $file_name2;
        $file_meal->pic3 = $file_name3;
        $file_meal->pic4 = $file_name4;

        $file_meal->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Meal stored Succesfully',
            'file_meal' => $file_meal
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(File_Meal $file_Meal)
    {
        //
        return new FileMealResource($file_Meal);

    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFile_MealRequest $request, File_Meal $file_Meal)
    {
        //
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File_Meal $file_Meal)
    {
        //
        $file_Meal->delete();
        return response()->json([
            'status' => 'success',
            'message' => "File_Meal Delete"]);
    }
}
