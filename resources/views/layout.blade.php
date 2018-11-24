@extends('layouts.app');

@section('content')
<html lang="es">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Using Maps</title>

    <script src="main.js"></script>

    <style type="text/css">
        #map { height: 600px; width: 100%; }
    </style>
      
    </head>
    <body onload="init();">
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9ZN1ADvXCqPmgcnxEIOU6hd1T42w7olo&callback=initMap" async defer></script>
    </body>
</html>
@endsection