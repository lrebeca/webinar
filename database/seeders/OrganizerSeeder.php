<?php

namespace Database\Seeders;

use App\Models\Organizer;
use Illuminate\Database\Seeder;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizer::create(
            [
                'unidad' => 'Contaduría Pública',
                'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
                'province_id' => 1
            ]);
        Organizer::create(
        [
            'unidad' => 'Administración Financiera',
            'detalle'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
            'province_id' => 1
        ]);
        Organizer::create(
        [
            'unidad' => 'Comercio Exterior y Aduanas',
            'detalle'=> 'Formar profesionales del área de comercio exterior y aduanas incorporando un criterio sistematico técnico en la construcción',
            'province_id' => 1
        ]);
        Organizer::create(
        [
            'unidad' => 'Contaduría Pública',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'province_id' => 2
        ]);
        Organizer::create(
        [
            'unidad' => 'Contaduría Pública',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'province_id' => 3
        ]);
        Organizer::create(
        [
            'unidad' => 'Contaduría Pública',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'province_id' => 4
        ]);
        Organizer::create(
        [
            'unidad' => 'Administración Financiera',
            'detalle'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
            'province_id' => 5
        ]);
        Organizer::create(
        [
            'unidad' => 'Administración Financiera',
            'detalle'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
            'province_id' => 6
        ]);
        Organizer::create(
        [
            'unidad' => 'Posgrado',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'province_id' => 1
        ]);
    }
}
