@extends('layouts.app')
@section('content')
  <br />
  <div class="container">
   <h4 align="center">Peratus Mengikut Tajuk Jurnal</h4><br />
   
   <div class="panel panel-default">
    {{-- <div class="panel-heading">
     <h3 class="panel-title">Carta Pie</h3>
    </div> --}}
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
  @endsection
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   var analytics = <?php echo $tajuk_artikel; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Peratus (%) bagi setiap tajuk Jurnal'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>