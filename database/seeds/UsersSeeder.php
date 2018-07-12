<?php

use Illuminate\Database\Seeder;
use feederation\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        		'nome'				=> 'John',
        		'sobrenome'			=> 'Smith',
        		'administrador'	=>	FALSE,
        		'sexo'				=>	'M',
        		'nascimento'		=>	'22/04/1993',
        		'email'				=>	'john_smith@gmail.com',
        		'senha'				=>	Hash::make('senha'),
        		'remember_token'	=> str_random(10),
        ]);
    }
}
