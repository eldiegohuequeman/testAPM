<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class RegionesController extends Controller
{
    
    public function get()
    {
      

        $data=  DB::table('casos')
        ->join('regiones', 'casos.id_region', '=', 'regiones.id')
        ->join('mes', 'casos.id_mes', '=', 'mes.id')
        ->select(
            'casos.id_region',
            'regiones.nombre_region',
            'mes.nombre_mes',
            DB::raw('SUM(CASE WHEN casos.sexo = 1 THEN 1 ELSE 0 END) AS hombres'),
            DB::raw('SUM(CASE WHEN casos.sexo = 2 THEN 1 ELSE 0 END) AS mujeres'),
            DB::raw('SUM(fallecido) AS total_fallecidos'),
            DB::raw('(SELECT COUNT(*) FROM casos WHERE casos.id_region = regiones.id) AS total')
        )
        ->groupBy(
            'casos.id_region',
            'regiones.nombre_region',
            'casos.sexo',
            'mes.nombre_mes',
            'regiones.id',
            'mes.id'
        )
        ->get();

        $totalCasos= DB::table('casos')->count();
        
        $fallecidos=DB::table('casos')->where('fallecido',1)->count('fallecido');


        $regiones= DB::table('regiones')
        ->select(['regiones.nombre_region', 'regiones.id'])
        ->get();

        $meses= DB::table('mes')
        ->select(['mes.nombre_mes', 'mes.id'])
        ->get();

        $sexo=2;
        return view('index',compact('data','totalCasos','fallecidos','regiones','meses','sexo'));
    }
}
