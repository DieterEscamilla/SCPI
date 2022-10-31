<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario_avanzado=Role::create(['name'=>'avanzado']);
        $usuario_basico=Role::create(['name'=>'basico']);
        Permission::create(['name'=>'avanzado.eliminar'])->assignRole($usuario_avanzado);
    }
}
