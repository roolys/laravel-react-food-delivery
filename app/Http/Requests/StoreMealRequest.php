<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMealRequest extends FormRequest
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
            
            'name'=>['required' ,'min:3', 'max:20'],
            'image'=>['required'],
            'description'=>['required' ,'min:3', 'max:20'],
            'price'=>['required' ,'min:3', 'max:20'],


            // 'slug'=>['required', 'unique:skills,slug']

        ];
    }
}
