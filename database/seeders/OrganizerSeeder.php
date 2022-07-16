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
                'provincia' => 'Oropeza-Sucre',
                'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            ]);
        Organizer::create(
        [
            'unidad' => 'Administración Financiera',
            'provincia' => 'Oropeza-Sucre',
            'detalle'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
        ]);
        Organizer::create(
        [
            'unidad' => 'Comercio Exterior y Aduanas',
            'provincia' => 'Oropeza-Sucre',
            'detalle'=> 'Formar profesionales del área de comercio exterior y aduanas incorporando un criterio sistematico técnico en la construcción',
        ]);
        Organizer::create(
        [
            'unidad' => 'Contaduría Pública',
            'provincia' => 'San Lucas T.S.',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
        ]);
        Organizer::create(
        [
            'unidad' => 'Contaduría Pública',
            'provincia' => 'Padilla',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
        ]);
        Organizer::create(
        [
            'unidad' => 'Contaduría Pública',
            'provincia' => 'Monteagudo',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
        ]);
        Organizer::create(
        [
            'unidad' => 'Administración Financiera',
            'provincia' => 'Camargo T.S.',
            'detalle'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
        ]);
        Organizer::create(
        [
            'unidad' => 'Administración Financiera',
            'provincia' => 'Huacareta T.S.',
            'detalle'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
        ]);
        Organizer::create(
        [
            'unidad' => 'Posgrado',
            'provincia' => 'Oropeza-Sucre',
            'detalle'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
        ]);
    }
}
