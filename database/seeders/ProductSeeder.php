<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateNow = Carbon::now();

        $category = Category::where('name', 'Eletrônicos')->first();

        $products = [
            [
                'name' => 'OnePlus 9',
                'description' => 'Disponível em várias cores, incluindo Astral Black, Arctic Sky e Winter Mist',
                'price' => 1400,
                'category_id' => $category->category_id,
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'Xiaomi Mi 11',
                'description' => 'Equipado com o processador Qualcomm Snapdragon 888',
                'price' => 1500,
                'category_id' => $category->category_id,
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'iPhone 13',
                'description' => 'Alimentado pelo chip Bionic A15 da Apple, o iPhone 13 possui uma tela Super Retina',
                'price' => 3700,
                'category_id' => $category->category_id,
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];

        DB::table('products')->insert($products);
    }
}
