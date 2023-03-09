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
        Permission::create(['name' => 'Ver dashboard']);

        Permission::create(['name' => 'Crear Role']);
        Permission::create(['name' => 'Leer Role']);
        Permission::create(['name' => 'Editar Role' ]);
        Permission::create(['name' => 'Eliminar Role']);

        Permission::create(['name' => 'Crear Usuarios']);
        Permission::create(['name' => 'Leer Usuarios']);
        Permission::create(['name' => 'Editar Usuarios']);
        Permission::create(['name' => 'Eliminar Usuarios']);

        Permission::create(['name' => 'Crear Eventos']);
        Permission::create(['name' => 'Leer Eventos']);
        Permission::create(['name' => 'Editar Eventos']);
        Permission::create(['name' => 'Eliminar Eventos']);

        Permission::create(['name' => 'Crear Detalles']);
        Permission::create(['name' => 'Leer Detalles']);
        Permission::create(['name' => 'Editar Detalles']);
        Permission::create(['name' => 'Eliminar Detalles']);

        Permission::create(['name' => 'Crear Documentos']);
        Permission::create(['name' => 'Leer Documentos']);
        Permission::create(['name' => 'Editar Documentos']);
        Permission::create(['name' => 'Eliminar Documentos']);

        Permission::create(['name' => 'Crear Organizadores']);
        Permission::create(['name' => 'Leer Organizadores']);
        Permission::create(['name' => 'Editar Organizadores']);
        Permission::create(['name' => 'Eliminar Organizadores']);

        Permission::create(['name' => 'Crear Provincias']);
        Permission::create(['name' => 'Leer Provincias']);
        Permission::create(['name' => 'Editar Provincias']);
        Permission::create(['name' => 'Eliminar Provincias']);

        Permission::create(['name' => 'Leer Participantes Pendientes']);
        Permission::create(['name' => 'Editar Participantes Pendientes']);
        Permission::create(['name' => 'Eliminar Participantes Pendientes']);

        Permission::create(['name' => 'Aprobar Participante']);
        Permission::create(['name' => 'Rechazar Participante']);

        Permission::create(['name' => 'Leer Participantes Aprobados']);
        Permission::create(['name' => 'Editar Participantes Aprobados']);
        Permission::create(['name' => 'Eliminar Participantes Aprobados']);
        Permission::create(['name' => 'Certificado Participantes Aprobados']);

        Permission::create(['name' => 'Leer Participantes Rechazados']);
        Permission::create(['name' => 'Editar Participantes Rechazados']);
        Permission::create(['name' => 'Eliminar Participantes Rechazados']); 

        Permission::create(['name' => 'Crear Certificados']);
        Permission::create(['name' => 'Leer Certificados']);
        Permission::create(['name' => 'Editar Certificados']);
        Permission::create(['name' => 'Eliminar Certificados']);

        Permission::create(['name' => 'Crear Imagenes']);
        Permission::create(['name' => 'Leer Imagenes']);
        Permission::create(['name' => 'Editar Imagenes']);
        Permission::create(['name' => 'Eliminar Imagenes']);
    }
}
