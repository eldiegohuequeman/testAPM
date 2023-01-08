<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mes;
use Faker\Generator as Faker;

$factory->define(Mes::class, function (Faker $faker) {
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    return [
        'nombre_mes' => $faker->randomElement($meses),
    ];
});
