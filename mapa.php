<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  
  </head>
  <body>


  <h1>ONDE ESTAMOS?</h1>
  <div id="mapa" style="height:500px; width:100%;"> </div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC-zjrWR4krPvjclNYP0fVrQfa_aLckyPs&amp;sensor=false%22%3E"></script>

    <script>
    var map;

    function initialize() {
        var coordenadas = { lat: -23.552950, lng: -46.399710 };

        var mapa= new google.maps.Map(document.getElementById('mapa'),{
            zoom:12,
            center: coordenadas,
            mapTypeId:'roadmap'
        });
        var marker = new google.maps.Marker({
            position: coordenadas,
            map: mapa,
        });
    }
    initialize();

</script>
  </body>
</html>