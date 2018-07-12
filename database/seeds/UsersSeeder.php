<?php

use Illuminate\Database\Seeder;
use feederation\User;
use Faker\Generator as Faker;

class UsuariosSeeder extends Seeder
{
    public function run(){	
  			factory(feederation\User::class, 5)->create();
  			}
		
}
