
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container text-white">
            <h5  >Prueba Tecnica Consulta Datos Covid </h5>
        </div>
    </nav>
      
    <div class="table-responsive" id="sailorTableArea">
        <div class="container mb-5 mt-5">
            <form action="/filter" method="GET">
                @csrf
            <div class="row container">
                    <div class="col-3">
                        <label for="">Mes</label><br>
                        <select class="form-control" name="mes"  id="">
                            @foreach ($meses as $m)     
                            <option value="{{$m->id}}">{{$m->nombre_mes}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">Region</label><br>
                        <select class="form-control" name="region" id="">
                            @foreach ($regiones as $r)     
                            <option value="{{$r->id}}">{{$r->nombre_region}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">Sexo</label><br>
                        <select class="form-control" name="sexo" id="">
                            <option value="0">Mujeres</option>
                            <option value="1">Hombres</option>
                            <option value="2">Ambos</option>
                        </select>
                    </div>
                
                    <div class="col-3"><br>
                        <button type="submit" class="form-control btn btn-primary">Buscar</button>
                    </div> 
                </div>
            </form> 
        </div>
        <div class="container ">
    
            @if ($sexo ==0)
            <table id="table_id" class="table table-striped table-bordered" width="100%">
     
                <thead>
                    <tr>
                        <th>Region</th>
                        <th>Casos Nuevos Sin Sintomas</th>
                        <th>Fallecidos</th>
                        <th>Mujeres</th>
                        <th>Mes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    @php
                    $pdo = new PDO('mysql:host=localhost;dbname=consulta', 'root', '');
                    $stmt2 = $pdo->prepare('SELECT SUM(CASE WHEN casos.sexo = 0 THEN 1 ELSE 0 END) AS mujeres FROM casos
                    INNER JOIN regiones ON regiones.id=casos.id_region where id_region= '.$d->id_region.'');
                    $stmt2->execute();
                    $row2 = $stmt2->fetch();
                    $mujeres = $row2['mujeres'];
                    @endphp
                    <tr>
                      
                        <td>{{$d->nombre_region}}</td>
                        <td>{{$d->total}}</td>
                        <td>{{$d->total_fallecidos}}</td>
                        <td>{{$mujeres}}</td>
                      
                        <td>{{$d->nombre_mes}}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
           
            @endif
            @if ($sexo ==1)
            <table id="table_id"class="table table-striped table-bordered" width="100%">
     
                <thead>
                    <tr>
                        <th>Region</th>
                        <th>Casos Nuevos Sin Sintomas</th>
                        <th>Fallecidos</th>
                        <th>Hombres</th>
                        <th>Mes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    @php
                    $pdo = new PDO('mysql:host=localhost;dbname=consulta', 'root', '');
                    $stmt1 = $pdo->prepare('SELECT SUM(CASE WHEN casos.sexo = 1 THEN 1 ELSE 0 END) AS hombres FROM casos
                    INNER JOIN regiones ON regiones.id=casos.id_region where id_region= '.$d->id_region.'');
                    $stmt1->execute();
                    $row1 = $stmt1->fetch();
                    $hombres = $row1['hombres'];
                    @endphp
                 
                    <tr>
                      
                        <td>{{$d->nombre_region}}</td>
                        <td>{{$d->total}}</td>
                        <td>{{$d->total_fallecidos}}</td>
                        <td>{{$hombres}}</td>
                      
                        <td>{{$d->nombre_mes}}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
          
            @endif
    
            @if ($sexo ==2)
            <table id="table_id" class="table table-striped table-bordered" width="100%">
     
                <thead>
                    <tr>
                        <th>Region</th>
                        <th>Casos Nuevos Sin Sintomas</th>
                        <th>Fallecidos</th>
                        <th>Hombres</th>
                        <th>Mujeres</th>
                        <th>Mes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    @php
                    $pdo = new PDO('mysql:host=localhost;dbname=consulta', 'root', '');
                    $stmt1 = $pdo->prepare('SELECT SUM(CASE WHEN casos.sexo = 1 THEN 1 ELSE 0 END) AS hombres FROM casos
                    INNER JOIN regiones ON regiones.id=casos.id_region where id_region= '.$d->id_region.'');
                    $stmt1->execute();
                    $row1 = $stmt1->fetch();
                    $hombres = $row1['hombres'];
    
                    $stmt2 = $pdo->prepare('SELECT SUM(CASE WHEN casos.sexo = 0 THEN 1 ELSE 0 END) AS mujeres FROM casos
                    INNER JOIN regiones ON regiones.id=casos.id_region where id_region= '.$d->id_region.'');
                    $stmt2->execute();
                    $row2 = $stmt2->fetch();
                    $mujeres = $row2['mujeres'];
                    @endphp
                 
                    <tr>
                      
                        <td>{{$d->nombre_region}}</td>
                        <td>{{$d->total}}</td>
                        <td>{{$d->total_fallecidos}}</td>
                        <td>{{$hombres}}</td>
                        <td>{{$mujeres}}</td>
                        <td>{{$hombres}}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
       
            @endif
          
         
        </div>
        
    
            <div class="container mt-5 mb-5">
                <h5>Graficos</h5>
                <canvas id="myChart"></canvas>
            </div>
    
        </div>



            <footer class="bg-dark text-center text-lg-start text-white">
              <div class="container p-4">
                <div class="row mt-4">
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Herramianetas</h5>
          
                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i></a>
                      </li>
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>Laravel version 9</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>Bootstrap5</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>data-table</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>Chartjs</a>
                      </li>
                    </ul>
                  </div>

                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Comandos a ocupar</h5>
          
                    <ul class="list-unstyled">
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>composer install</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-backspace fa-fw fa-sm me-2"></i> php artisan migrate:fresh --seed</a>
                      </li>
        
                    </ul>
                  </div>

                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Funciones</h5>
          
                    <ul class="list-unstyled">
                      <li>
                        <a href="#!" class="text-white">Mostrar todos los datos de la bd</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Filtrar por region-sexo-mes </a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Filtros mostrara en graficos los ultimos tres meses </a>
                      </li>
                    </ul>
                  </div>
       
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contacto</h5>
          
                    <ul class="list-unstyled">
                      <li>
                        <a href="https://www.linkedin.com/in/diego-huequeman-842931200/" class="text-white"><i class="fas fa-at fa-fw fa-sm me-2"></i>Linkedin</a>
                      </li>
                      <li>
                        <a href="https://github.com/eldiegohuequeman" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>GitHub</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-envelope fa-fw fa-sm me-2"></i>diego.r.huequeman@gmail.com</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white"><i class="fas fa-envelope fa-fw fa-sm me-2"></i>Telefono: 56998671963</a>
                      </li>
                    </ul>
                  </div>
               
                </div>
              </div>
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                Diego Raul Huequeman Galalrdo
              </div>
            
            </footer>
          
         
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
{{-- SCRIP PARA GRAFICOS  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Casos Nuevos', 'Fallecidos'],
            datasets: [{
            label: '% de los ultimos 3 meses',
            data: [{{$totalCasos}}, {{$fallecidos}}],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true,
                scaleLabel: {
                display: true,
                labelString: 'Número de casos'
                }
            }
            }
        }
        });

        

$(document).ready( function () {
    $('#table_id').DataTable();
} );
      </script>


