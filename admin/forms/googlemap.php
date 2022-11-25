<!DOCTYPE html>
<html>
<head> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIQFsUVG64-ALvrU5m3RtK3ZIbGl5O2Ec"></script>

    <script type="text/javascript">
        function initialize() {
            // Creating map object
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 8,
                center: new google.maps.LatLng(26.158435, 94.562443),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(26.158435, 94.562443),
                draggable: true
            });

            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#latitude").val(evt.latLng.lat().toFixed(6));
                $("#longitude").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });

            // centers the map on markers coords
            map.setCenter(vMarker.position);

            // adds the marker on the map
            vMarker.setMap(map);
        }
    </script>
</head>
<body onload="initialize();">  
    <div id="map_canvas" style="width: auto; height: 500px;">
    </div>
</body>
</html>