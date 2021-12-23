<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Rol;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('menus')->truncate();
        DB::table('menus')->insert(
            [
                0 => ['id' => '1', 'descripcion' => 'Gestion de usuarios', 'enlace' => 'admin.users.index', 'rol_id' => '1', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                1 => ['id' => '2', 'descripcion' => 'Admin. de archivos', 'enlace' => 'admin.users.index', 'rol_id' => '2', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                2 => ['id' => '3', 'descripcion' => 'Herramientas de usuarios', 'enlace' => 'admin.users.index', 'rol_id' => '3', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
