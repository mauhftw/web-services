<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'username'  => 'admin',
            'email'     => 'admin@sa05.um.edu.ar',
            'name'=> 'Administrator',
            'password' => Hash::make('pepedemonio2314') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}
