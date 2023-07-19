<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_Meal extends Model
{
    use HasFactory;
    protected $fillable = ['pic1', 'pic2', 'pic3', 'pic4','meal_id','code_meal'];
}
