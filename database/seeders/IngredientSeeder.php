<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //only import seeds if DB is empty.
        if (!Ingredient::count()) {
            $this->importIngredients();
        }
    }

    public function importIngredients()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.themealdb.com/api/json/v1/1/list.php?i=list');

        if ($res->getStatusCode() == 200) {
            $ingredientJSON = json_decode($res->getBody()->getContents(), true);

            foreach ($ingredientJSON['meals'] as $ingredient) {
                DB::table('ingredients')->insert([
                    'name' => $ingredient['strIngredient'],
                    'description' => $ingredient['strDescription'],
                    'thumbnail' => 'https://www.themealdb.com/images/ingredients/' . $ingredient['strIngredient'] . ".png",
                    'type' => $ingredient['strType'],
                    'created_at' => now(),
                ]);
            }
        }
    }
}
