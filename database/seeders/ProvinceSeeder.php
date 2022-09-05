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
            'provincia' => 'Oropeza-Sucre',
            'info' => 'Chuquisaca - Bolivia'
        ]);
        Province::create([
            'provincia' => 'San Lucas T.S.',
            'info' => 'Chuquisaca - Bolivia'
        ]);
        Province::create([
            'provincia' => 'Padilla',
            'info' => 'Chuquisaca - Bolivia'
        ]);
        Province::create([
            'provincia' => 'Monteagudo',
            'info' => 'Chuquisaca - Bolivia'
        ]);
        Province::create([
            'provincia' => 'Camargo T.S.',
            'info' => 'Chuquisaca - Bolivia'
        ]);
        Province::create([
            'provincia' => 'Huacareta T.S.',
            'info' => 'Chuquisaca - Bolivia'
        ]);
    }
}
