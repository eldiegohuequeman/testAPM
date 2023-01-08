<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\regiones;
use Faker\Generator as Faker;

$factory->define(regiones::class, function (Faker $faker) {
    $regiones = [
        ['nombre_region' => 'Tarapacá'],
        ['nombre_region' => 'Antofagasta'],
        ['nombre_region' => 'Atacama'],
        ['nombre_region' => 'Coquimbo'],
        ['nombre_region' => 'Valparaíso'],
        ['nombre_region' => 'O’Higgins'],
        ['nombre_region' => 'Maule'],
        ['nombre_region' => 'Ñuble'],
        ['nombre_region' => 'Bio-Bio'],
        ['nombre_region' => 'Araucania'],
        ['nombre_region' => 'Los Rios'],
        ['nombre_region' => 'Los Lagos'],
        ['nombre_region' => 'Aysen'],
        ['nombre_region' => 'Magallanes'],
    ];
        return [
            'nombre_region' => $faker->randomElement($regiones),
        ];
    });
    