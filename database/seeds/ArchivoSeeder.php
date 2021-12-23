<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('archivos')->truncate();
        DB::table('archivos')->insert(
            [
                0 => ['id' => '1', 'nombre' => 'file1.txt', 'ruta_acceso' => 'root/files/users/1', 'user_id' => '1', 'created_at' => now(), 'updated_at' => now()],
                1 => ['id' => '2', 'nombre' => 'image01.png', 'ruta_acceso' => 'root/files/users/1', 'user_id' => '1', 'created_at' => now(), 'updated_at' => now()],
                2 => ['id' => '3', 'nombre' => 'photo_1.jpeg', 'ruta_acceso' => 'root/files/users/3', 'user_id' => '3', 'created_at' => now(), 'updated_at' => now()],
                3 => ['id' => '4', 'nombre' => 'cv.docx', 'ruta_acceso' => 'root/files/users/4', 'user_id' => '4', 'created_at' => now(), 'updated_at' => now()],
                4 => ['id' => '5', 'nombre' => 'estudios-tarea.doc', 'ruta_acceso' => 'root/files/users/2', 'user_id' => '2', 'created_at' => now(), 'updated_at' => now()],
                5 => ['id' => '6', 'nombre' => 'procesos.xlsx', 'ruta_acceso' => 'root/files/users/4', 'user_id' => '4', 'created_at' => now(), 'updated_at' => now()],
                6 => ['id' => '7', 'nombre' => 'dibujo.png', 'ruta_acceso' => 'root/files/users/2', 'user_id' => '2', 'created_at' => now(), 'updated_at' => now()],
                7 => ['id' => '8', 'nombre' => 'proyecto-ssl.7z', 'ruta_acceso' => 'root/files/users/3', 'user_id' => '3', 'created_at' => now(), 'updated_at' => now()],
                8 => ['id' => '9', 'nombre' => 'los-arboles.pptx', 'ruta_acceso' => 'root/files/users/2', 'user_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
