<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create(
        [
            'unidad' => 'Contaduría Pública',
            'descripcion'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'id_provincia' => '1'
        ]);
        Unit::create(
        [
            'unidad' => 'Administración Financiera',
            'descripcion'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
            'id_provincia' => '1'
        ]);
        Unit::create(
        [
            'unidad' => 'Comercio Exterior y Aduanas',
            'descripcion'=> 'Formar profesionales del área de comercio exterior y aduanas incorporando un criterio sistematico técnico en la construcción',
            'id_provincia' => '1'
        ]);
        Unit::create(
        [
            'unidad' => 'Contaduría Pública',
            'descripcion'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'id_provincia' => '2'
        ]);
        Unit::create(
        [
            'unidad' => 'Contaduría Pública',
            'descripcion'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'id_provincia' => '3'
        ]);
        Unit::create(
        [
            'unidad' => 'Contaduría Pública',
            'descripcion'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'id_provincia' => '4'
        ]);
        Unit::create(
        [
            'unidad' => 'Administración Financiera',
            'descripcion'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
            'id_provincia' => '5'
        ]);
        Unit::create(
        [
            'unidad' => 'Administración Financiera',
            'descripcion'=> 'Institucion de educación superior a nivel de grado y posgrado con liderazgo nacional',
            'id_provincia' => '6'
        ]);
        Unit::create(
        [
            'unidad' => 'Posgrado',
            'descripcion'=> 'Unidad academica con la mejor opcion de educación nacional e internacional',
            'id_provincia' => '1'
        ]);
    }
}
