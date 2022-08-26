<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear Eventos'
        ]);
        Permission::create([
            'name' => 'Leer Eventos'
        ]);
        Permission::create([
            'name' => 'Actualizar Eventos'
        ]);
        Permission::create([
            'name' => 'Eliminar Eventos'
        ]);
        Permission::create([
            'name' => 'Ver dashboard'
        ]);
        Permission::create([
            'name' => 'Crear Role'
        ]);
        Permission::create([
            'name' => 'Leer Role'
        ]);
        Permission::create([
            'name' => 'Actualizar Role'
        ]);
        Permission::create([
            'name' => 'Eliminar Role'
        ]);
        Permission::create([
            'name' => 'Leer Usuarios'
        ]);
        Permission::create([
            'name' => 'Editar Usuarios'
        ]);
        
        // Permission::create([
        //     'name' => 'Editar Participantes'
        // ]);

    }
}
