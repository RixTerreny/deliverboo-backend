<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $restaurants=[
            'restaurant_1'=> [
                'user_id' => '1',
                'name' => 'Onda Marina',
                'address' => 'Via della riviera',
                'vat' => '123456789',
                'photo' => 'img',
            ],
            'restaurant_2'=> [
                'user_id' => '2',
                'name' => 'Bellavista',
                'address' => 'Via della rbella vista',
                'vat' => '987654321',
                'photo' => 'img',
            ],
            'restaurant_3'=> [
                'user_id' => '3',
                'name' => 'Da Paolo',
                'address' => 'Via cantù',
                'vat' => '123987564',
                'photo' => 'img',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create([
                'user_id' => $restaurant['user_id'],
                'name' => $restaurant['name'],
                'address' => $restaurant['address'],
                'vat' => $restaurant['vat'],
                'photo' => $restaurant['photo'],
            ]);
        };
    }
}
