@extends('layouts.app');

@section('content')
    <div id="layout"></div> 


   <!doctype html>
<html lang="es">
  <head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8" />
      <link rel="stylesheet" type="text/css" href="google.css"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>GolpeAvisa</title>
	   <style type="text/css">
		#mapa { height: 500px; width: 50%; }
		</style>
  </head>
  <body>
  
	    <div id="mapa"></div>
  
  <script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9ZN1ADvXCqPmgcnxEIOU6hd1T42w7olo&callback=initMap"></script>
    <script type="text/javascript">
    function initialize() {
      var marcadores = [
        @foreach($locations as $location)
          ['{!!$location->id!!}',{!!$location->longitud!!},{!!$location->latitud!!}],
        @endforeach        
      ];
      var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 12,
        center: new google.maps.LatLng(32.4688, -116.8951),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < marcadores.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          console.log(marker);
          return function() {
            infowindow.setContent(marcadores[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </body>
</html>
@endsection