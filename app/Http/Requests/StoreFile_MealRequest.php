<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFile_MealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'pic1'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'pic2'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'pic3'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'pic4'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'meal_id'=>'required',
            'code_meal'=>'required'



        ];
    }
}
