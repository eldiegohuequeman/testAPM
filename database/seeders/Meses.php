<?php

namespace Database\Seeders;

use App\Models\Mes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Carbon;

class Meses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mes1 = new Mes;
        $mes1->nombre_mes="Enero";
        $mes1->fecha= '2000-01-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Febrero";
        $mes1->fecha= '2000-02-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Marzo";
        $mes1->fecha= '2000-03-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Abril";
        $mes1->fecha= '2000-04-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Mayo";
        $mes1->fecha= '2000-05-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Junio";
        $mes1->fecha= '2000-06-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Julio";
        $mes1->fecha= '2000-07-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Agosto";
        $mes1->fecha= '2000-08-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Septiembre";
        $mes1->fecha= '2000-09-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Octubre";
        $mes1->fecha= '2000-10-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Noviembre";
        $mes1->fecha= '2000-11-01';
        $mes1->save();

        $mes1 = new Mes;
        $mes1->nombre_mes="Diciembre";
        $mes1->fecha= '2000-01-01';
        $mes1->save();
    }
}
