<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        //
        'nome' => $faker->name,
        'telefone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email, //unique() faz com que o email não pode se repetir.
        'motivo_contatos_id' => $faker->numberBetween(1,4),
        'mensagem' => $faker->text()  
    ];
});
