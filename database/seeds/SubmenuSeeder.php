<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('submenus')->truncate();
        DB::table('submenus')->insert(
            [
                0 => ['id' => '1', 'descripcion' => 'Registro de archivos Adm.', 'enlace' => 'admin.users.index', 'menu_id' => '2', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                1 => ['id' => '2', 'descripcion' => 'Carga de archivos Adm.', 'enlace' => 'admin.users.index', 'menu_id' => '2', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                2 => ['id' => '3', 'descripcion' => 'Registro de archivos', 'enlace' => 'admin.users.index', 'menu_id' => '3', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                3 => ['id' => '4', 'descripcion' => 'Carga de archivos', 'enlace' => 'admin.users.index', 'menu_id' => '3', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
