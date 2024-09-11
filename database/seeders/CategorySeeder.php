<?php

namespace Database\Seeders;

use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //only import seeds if DB is empty.
        if (!Category::count()) {
            $this->importCategories();
        }
    }

    public function importCategories()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.themealdb.com/api/json/v1/1/categories.php');

        if ($res->getStatusCode() == 200) {
            $categoryJSON = json_decode($res->getBody()->getContents(), true);

            foreach ($categoryJSON['categories'] as $category) {
                DB::table('categories')->insert([
                    'name' => $category['strCategory'],
                    'description' => $category['strCategoryDescription'],
                    'thumbnail' => $category['strCategoryThumb']
                ]);
            }
        }
    }
}
