<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rols')->truncate();
        DB::table('rol_user')->truncate();
        DB::table('rols')->insert(
            [
                0 => ['id' => '1', 'slug' => 'adminA', 'nombre' => 'Administrador A', 'descripcion' => 'Encargado de la administración de usuarios.', 'created_at' => now(), 'updated_at' => now()],
                1 => ['id' => '2', 'slug' => 'adminB', 'nombre' => 'Administrador B', 'descripcion' => 'Encargado de la administración de archivos de usuarios.', 'created_at' => now(), 'updated_at' => now()],
                2 => ['id' => '3', 'slug' => 'user', 'nombre' => 'Usuario', 'descripcion' => 'Sube archivos, puede ver su histórico de archivos subidos y descargarlos.', 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
