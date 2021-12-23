<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Rol;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();

        $adminARol = Rol::where('slug','adminA')->first();
        $adminBRol = Rol::where('slug','adminB')->first();
        $userRol = Rol::where('slug','user')->first();

        $adminA = User::create(
            [
                'id' => '1',
                'name' => 'Maria',
                'email' => 'admin.a@testmail.com',
                'password' => Hash::make('clave123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        $adminB = User::create(
            [
                'id' => '2',
                'name' => 'Maximiliano',
                'email' => 'admin.b@testmail.com',
                'password' => Hash::make('clave123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        $user1 = User::create(
            [
                'id' => '3',
                'name' => 'Pedro',
                'email' => 'user1@testmail.com',
                'password' => Hash::make('clave123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        $user2 = User::create(
            [
                'id' => '4',
                'name' => 'Alejandra',
                'email' => 'user2@testmail.com',
                'password' => Hash::make('clave123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        $adminA->roles()->attach($adminARol);
        $adminB->roles()->attach($adminBRol);
        $user1->roles()->attach($userRol);
        $user2->roles()->attach($userRol);



    }
}
