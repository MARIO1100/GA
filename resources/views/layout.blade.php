@extends('layouts.app');

@section('content')
    <div id="layout"></div>




    <h3>Punto de Emergencia</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 32.461960, lng: -116.823449};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9ZN1ADvXCqPmgcnxEIOU6hd1T42w7olo&callback=initMap">
    </script>
    <div class="card" style="width: 30rem; padding: 30;">
        <div class="card-header" style=" background-color: darkgray">
          DETALLES
        </div>
        <ul class="list-group list-group-flush" style="background-color: gray; color: #000000;">
          <li class="list-group-item">Velocidad:</li>
          <li class="list-group-item">Ubicacion:</li>
          <li class="list-group-item">Destino:</li>
        </ul>
      </div>
@endsection