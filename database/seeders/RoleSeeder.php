<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create(['name' => 'Admin']);
        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49]);

        $role = Role::create(['name' => 'Organizador']);
        $role->syncPermissions(['Ver dashboard',

                                'Crear Eventos',
                                'Leer Eventos', 
                                'Editar Eventos', 
                                'Eliminar Eventos',
                            
                                'Crear Detalles',
                                'Leer Detalles',
                                'Editar Detalles',
                                'Eliminar Detalles',

                                'Crear Documentos',
                                'Leer Documentos',
                                'Editar Documentos',
                                'Eliminar Documentos',

                                'Crear Organizadores',
                                'Leer Organizadores',
                                'Editar Organizadores',
                                'Eliminar Organizadores',

                                'Crear Provincias',
                                'Leer Provincias',
                                'Editar Provincias',
                                'Eliminar Provincias'

                            ]);

        $role = Role::create(['name' => 'Oficina Administración']);
        $role->syncPermissions(['Ver dashboard',

                                'Leer Eventos', 
                                'Leer Organizadores',
                                'Leer Provincias',
                                'Leer Certificados',
                                'Leer Detalles',
                                'Leer Documentos',

                                'Leer Participantes Pendientes',
                                'Editar Participantes Pendientes',
                                'Eliminar Participantes Pendientes',

                                'Leer Participantes Aprobados',
                                'Editar Participantes Aprobados',
                                'Eliminar Participantes Aprobados',

                                'Leer Participantes Rechazados',
                                'Editar Participantes Rechazados',
                                'Eliminar Participantes Rechazados',

                                'Aprobar Participante',
                                'Rechazar Participante',

                            ]);

        $role = Role::create(['name' => 'Expositores']);
        $role->syncPermissions(['Ver dashboard',

                                'Leer Eventos', 
                                'Leer Participantes Pendientes',
                                'Leer Participantes Aprobados',
                                'Leer Participantes Rechazados',
                                'Leer Certificados',
                                
                                'Crear Detalles',
                                'Leer Detalles',
                                'Editar Detalles',
                                'Eliminar Detalles',

                                'Crear Documentos',
                                'Leer Documentos',
                                'Editar Documentos',
                                'Eliminar Documentos',
                                
                            ]);

    }
}
