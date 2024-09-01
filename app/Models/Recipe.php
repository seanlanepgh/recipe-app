<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public $table = 'recipes';
    //mass assignable items
    protected $fillable = [
        "name",
        "category",
        "area",
        "instructions",
        "thumbnail",
        "ingredients",
        "measurements",
        "source",
        "youtube"

    ];
}
