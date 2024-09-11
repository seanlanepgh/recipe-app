<?php

namespace Database\Seeders;

use App\Models\Recipe;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //only import seeds if DB is empty.
        if (!Recipe::count()) {
            $this->importRecipes();
        }
    }

    public function importRecipes()
    {
        $client = new Client();
        $requestCount = 0;
        for ($i = 52700; $i < 53100; $i++) {

            if ($requestCount == 59) {
                $requestCount = 0;
                sleep(10);
            }

            $res = $client->request('GET', 'https://www.themealdb.com/api/json/v1/1/lookup.php?i=' . $i);

            if ($res->getStatusCode() == 200) {
                $recipeJSON = json_decode($res->getBody()->getContents(), true);
                if ($recipeJSON['meals'] !== null) {
                    $recipeJSON = $recipeJSON['meals'][0];
                    $ingredients = [];
                    // Extract ingredients and measurements
                    for ($j = 1; $j <= 20; $j++) {
                        $ingredient = $recipeJSON['strIngredient' . $j];
                        $measure = $recipeJSON['strMeasure' . $j];

                        if (!empty($ingredient) && !empty($measure)) {
                            $ingredients[] = [
                                'ingredient' => $ingredient,
                                'measure' => $measure
                            ];
                        }
                    }

                    DB::table('recipes')->insert([
                        'name' => $recipeJSON['strMeal'],
                        'thumbnail' => $recipeJSON['strMealThumb'],
                        'tags' => $recipeJSON['strTags'],
                        'area' => $recipeJSON['strArea'],
                        'category' => $recipeJSON['strCategory'],
                        'youtube' => $recipeJSON['strYoutube'],
                        'source' => $recipeJSON['strSource'],
                        'ingredients' => json_encode($ingredients),
                        'instructions' => $recipeJSON['strInstructions'],
                        'created_at' => now(),
                    ]);
                }
            }

            $requestCount++;
        }
    }
}
