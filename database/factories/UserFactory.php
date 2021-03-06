<?php

use Faker\Generator as Faker;

$faker = \Faker\Factory::create('pt_BR');

/*$factory->define(feederation\User::class, function (Faker $faker) {
    return [
        'nome' 					=> $faker->firstName,
		  'sobrenome' 				=> $faker->lastName,        
        'email' 					=> $faker->safeEmail,
        'nascimento'				=> $faker->date,
        'sexo'						=> $faker->randomElement(['masculino', 'feminino']),
        'administrador'			=> $faker->boolean($chanceOfGettingTrue = 0),        
        'password' 				=> bcrypt(str_random(10)),
        'remember_token'		=> str_random(10),
    ];
});*/

$factory->define(feederation\User::class, function (Faker $faker) {
    return [
        'nome' 					=> $faker->firstName,
		  'sobrenome' 				=> $faker->lastName,        
        'email' 					=> $faker->safeEmail,
        'nascimento'				=> $faker->date,
        'sexo'						=> $faker->randomElement(['masculino', 'feminino']),
        'administrador'			=> $faker->boolean($chanceOfGettingTrue = 100),        
        'password' 				=> bcrypt('admin'),
        'remember_token'		=> str_random(10),
    ];
});

