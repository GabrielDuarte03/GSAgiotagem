let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -23.552950, lng: -46.399710 },
    zoom: 8,
  });
}