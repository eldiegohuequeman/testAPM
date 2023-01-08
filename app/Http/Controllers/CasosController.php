<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class CasosController extends Controller
{
    public function filter(Request $request){


        $f=DB::select("SELECT fecha FROM mes where id = $request->mes");
        $fecha = Carbon::parse(strval($f[0]->fecha)); // convierte la fecha enviada en un objeto Carbon
        $fecha_formateada = strval($fecha); // convierte el objeto Carbon en una cadena de texto sin formatear
        $fecha_objeto = Carbon::parse($fecha_formateada); // convierte la cadena de fecha en un objeto Carbon
        $start_date = $fecha_objeto->subMonths(3)->endOfDay(); // obtiene la fecha de hace 3 meses y establece las horas, minutos y segundos en 0
        $end_date = $fecha->endOfDay(); // obtiene la fecha actual y establece las horas, minutos y segundos en 23:59:59// obtiene la fecha actual y establece las horas, minutos y segundos en 23:59:59
       
        if($request->sexo==0)
        {
            $data= DB::table('casos')
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
            ->where('casos.id_region',$request->region)
            ->groupBy(
                'casos.id_region',
                'regiones.nombre_region',
                'casos.sexo',
                'mes.nombre_mes',
                'regiones.id',
                'mes.id'
            )
            ->get();
    
            $totalCasos= DB::table('casos')
            ->join('mes', 'casos.id_mes', '=', 'mes.id')
            ->where('casos.id_region', $request->region)
            ->where('casos.sexo', 0)
            ->whereBetween('mes.fecha', [$start_date, $end_date])
            ->count();
            
            $fallecidos=DB::table('casos')
            ->join('mes', 'casos.id_mes', '=', 'mes.id')
            ->where('id_region',$request->region)
            ->where('fallecido',1)
            ->whereBetween('mes.fecha', [$start_date, $end_date])
            ->count('fallecido');
    
    
            $regiones= DB::table('regiones')
            ->select(['regiones.nombre_region', 'regiones.id'])
            ->get();
    
            $meses= DB::table('mes')
            ->select(['mes.nombre_mes', 'mes.id'])
            ->get();
    
            $sexo=0;
            return view('index',compact('data','totalCasos','fallecidos','regiones','meses','sexo'));
        }

        if($request->sexo==1)
        {
            $data= DB::table('casos')
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
            ->where('casos.id_region',$request->region)
            ->groupBy(
                'casos.id_region',
                'regiones.nombre_region',
                'casos.sexo',
                'mes.nombre_mes',
                'regiones.id',
                'mes.id'
            )
            ->get();
            
            $totalCasos= DB::table('casos')
            ->join('mes', 'casos.id_mes', '=', 'mes.id')
            ->where('casos.id_region', $request->region)
            ->where('casos.sexo', 1)
            ->whereBetween('mes.fecha', [$start_date, $end_date])
            ->count();
            
            $fallecidos=DB::table('casos')
            ->join('mes', 'casos.id_mes', '=', 'mes.id')
            ->where('id_region',$request->region)
            ->where('fallecido',1)
            ->whereBetween('mes.fecha', [$start_date, $end_date])
            ->count('fallecido');
    
    
            $regiones= DB::table('regiones')
            ->select(['regiones.nombre_region', 'regiones.id'])
            ->get();
    
            $meses= DB::table('mes')
            ->select(['mes.nombre_mes', 'mes.id'])
            ->get();
    
            $sexo=1;
            return view('index',compact('data','totalCasos','fallecidos','regiones','meses','sexo'));
        }

        if($request->sexo==2)
        { 
            $data= DB::table('casos')
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
            ->where('casos.id_region',$request->region)
            ->groupBy(
                'casos.id_region',
                'regiones.nombre_region',
                'casos.sexo',
                'mes.nombre_mes',
                'regiones.id',
                'mes.id'
            )
            ->get();

    
            $totalCasos= DB::table('casos')
            ->join('mes', 'casos.id_mes', '=', 'mes.id')
            ->where('casos.id_region', $request->region)
            ->whereBetween('mes.fecha', [$start_date, $end_date])
            ->count();
            
            $fallecidos=DB::table('casos')
            ->join('mes', 'casos.id_mes', '=', 'mes.id')
            ->where('id_region',$request->region)
            ->where('fallecido',1)
            ->whereBetween('mes.fecha', [$start_date, $end_date])
            ->count('fallecido');
    
    
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
}
