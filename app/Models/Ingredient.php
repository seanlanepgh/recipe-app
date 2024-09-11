<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    public $table = 'ingredients';

    //mass assignable items
    protected $fillable = [
        "name",
        "description",
        "thumbnail",
        "type"
    ];
}
