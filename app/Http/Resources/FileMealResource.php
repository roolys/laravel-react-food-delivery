<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileMealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id'=>$this->id,
            'pic1'=>$this->pic1,
            'pic2'=>$this->pic2,
            'pic3'=>$this->pic3,
            'pic4'=>$this->pic4,
            'meal_id'=>$this->meal_id,
            'code_meal'=>$this->code_meal,

        ];
    }
}
