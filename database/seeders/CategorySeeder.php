<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateNow = Carbon::now();

        $categories = [
            [
                'name' => 'Eletrônicos',
                'description' => 'Este nicho inclui a venda de dispositivos eletrônicos, como smartphones, laptops, tablets',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'Lar e Decoração',
                'description' => 'Este nicho inclui a venda de móveis, decorações para o lar, utensílios domésticos, eletrodomésticos, artigos de cama, mesa e banho',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'Moda e Acessórios',
                'description' => 'Envolve a venda de roupas, calçados, acessórios e joias',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
