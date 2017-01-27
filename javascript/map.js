
      function initMap() {
        var uluru = {lat: 44.951248, lng: 20.205393};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru,
          styles: [
]


        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          icon: 'images/icons/marker.png'

        });
      }
