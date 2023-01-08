<?php

namespace Database\Seeders;

use App\Models\regiones as ModelsRegiones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Regiones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = new ModelsRegiones();
        $region->nombre_region="Arica Parinacota";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Tarapaca";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Antofagasta";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Atacama";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Coquimbo";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Valparaiso";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Metropolitana";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="O´Higgins";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Maule";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Ñuble";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="BioBio";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Araucania";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Los Rios";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Los Lagos";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Aysen";
        $region->save();

        $region = new ModelsRegiones();
        $region->nombre_region="Magallanes";
        $region->save();
    }
}
