@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">  Gestion Administrativa</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item active">Graficas</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Mis Graficas</h4>
              <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="true">
                    Reporte de ventas </a> </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#prod" role="tab" aria-selected="false">
                    Productos mas vendidos</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div id="piechart" style="width: 100%; height: 500px;"></div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="prod" role="tabpanel">
                      <div class="card-body">
                        <div class="table-responsive">
                          <div id="producs" style="width: 100%; height: 500px;"></div>
                        </div>
                      </div>
                  </div>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Country');
      data.addColumn('number', 'GDP');
      data.addRows([
        ['Enero', {{$enero}}],
        ['Febreo', {{$feb}}],
        ['Marzo', {{$mar}}],
        ['Abril', {{$abril}}],
        ['Mayo', {{$may}}],
        ['Junio', {{$jun}}],
        ['Julio', {{$jul}}],
        ['Agosto', {{$ago}}],
        ['Sept', {{$sep}}],
        ['Oct', {{$oct}}],
        ['Nov', {{$nov}}],
        ['Dic', {{$dic}}]
      ]);


      var options = {
        title: 'Grafica de Ventas',
        legend: 'none',
        bar: {groupWidth: '95%'},
        //vAxis: { gridlines: { count: 4 } }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }

  </script>
  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawProductos);

    function drawProductos() {
      var datas = google.visualization.arrayToDataTable([
        ['Nombre del producto', 'Cantidad'],
        @php
          foreach($topProd as $product) {
            echo "['".$product->name."', ".$product->quantity."],";
          }
        @endphp
      ]);

      var options = {
        title: 'Productos mas vendidos'
      };

      var charts = new google.visualization.PieChart(document.getElementById('producs'));

      charts.draw(datas, options);
    }
  </script>
@endsection
