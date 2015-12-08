<?php

use Illuminate\Database\Seeder;
use SRAC\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name'      => 'admin',
            'email'     => 'admin@srac.cl',
            'password'  => bcrypt('admin'),
            'role'      => 'administrador',
        ]);
        $admin->save();
        $encargado = User::create([
            'name'      => 'encargado',
            'email'     => 'encargado@srac.cl',
            'password'  => bcrypt('123123'),
            'role'      => 'encargado',
        ]);
        $encargado->save();
        $socio = User::create([

            'name'      => 'socio',
            'email'     => 'socio@srac.cl',
            'password'  => bcrypt('123123'),
            'role'      => 'socio',

        ]);
        $socio->save();
        $cliente = User::create([
            'name'      => 'cliente',
            'email'     => 'cliente@srac.cl',
            'password'  => bcrypt('123123'),
            'role'      => 'cliente',
        ]);
        $cliente->save();
    }
}
