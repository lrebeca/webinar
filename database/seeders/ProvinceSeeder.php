<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
                'provincia' => 'Sucre',
                'departamento' => 'Chuquisaca'
            ]);
        Province::create([
            'provincia' => 'San Lucas T.S',
            'departamento' => 'Chuquisaca'
        ]); 
        Province::create([
            'provincia' => 'Padilla',
            'departamento' => 'Chuquisaca'
        ]);
        Province::create([
            'provincia' => 'Monteagudo',
            'departamento' => 'Chuquisaca'
        ]);
        Province::create([
            'provincia' => 'Camargo T.S.',
            'departamento' => 'Chuquisaca'
        ]); 
        Province::create([
            'provincia' => 'Huacareta T.S.',
            'departamento' => 'Chuquisaca'
        ]);
    }
}
