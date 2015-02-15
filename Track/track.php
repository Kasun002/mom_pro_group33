<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>MOM PRO</title>
        <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css" rel="stylesheet">
        <link href="../css/agency.css" rel="stylesheet">
        <script language="javascript" type="text/javascript"></script>



        <script type="text/javascript">
            var directionDisplay;
            var directionsService = new google.maps.DirectionsService();

            var geocoder;
            var map;
            var geodesic;
            var poly;
            var src_latlng;
            var dst_latlng;

            function initialize() {
                directionsDisplay = new google.maps.DirectionsRenderer();

                geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(6.9344, 79.8428);
                var myOptions = {
                    zoom: 8,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);


                var polyOptions = {
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 3
                }
                poly = new google.maps.Polyline(polyOptions);
                poly.setMap(map);
                directionsDisplay.setMap(map);
                // Add a listener for the click event
                //google.maps.event.addListener(map, 'click', addLocation);
            }

            function codeAddress() {
                var src_address = document.getElementById("SRC_ADDR").value;
                var dst_address = document.getElementById("DST_ADDR").value;

                geocoder.geocode({'address': src_address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        var path = poly.getPath();
                        path.push(results[0].geometry.location);
                        src_latlng = results[0].geometry.location;
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
                geocoder.geocode({'address': dst_address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        map.setZoom(8);

                        var path = poly.getPath();
                        path.push(results[0].geometry.location);
                        dst_latlng = results[0].geometry.location;
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });


                        calcRoute();

                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });



            }

            function calcRoute() {
                var start = src_latlng;
                var end = dst_latlng;
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
                directionsService.route(request, function(result, status) {

                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(result);
                    } else {
                        alert(status);
                    }
                });
            }


        </script>
    </head>
    <body onload="initialize()">
        

        <div class="container center">
            <p></p>
            <ul class="nav nav-tabs">

                <li><a href="../profile.php"><span class="glyphicon glyphicon-user"> MyProfile</span></a></li>
                <li><a href="../forum/index.php"><span class="glyphicon glyphicon-envelope"> Forum</span></a></li>
                <li><a href="../appoinment/mother_view.php"><span class="glyphicon glyphicon-briefcase"> Appointment</span></a></li>
                <li><a href="../Event/scheduleMotheView.php"><span class="glyphicon glyphicon-bell"> Schedule</span></a></li>
                <li><a href="../report/graph_inputs2.php"><span class="glyphicon glyphicon-bell"> Report Analyzer</span></a></li>
                <li class="active"><a href="track.php"><span class="glyphicon glyphicon-bell"> Tracker</span></a></li>
                <li><a href="../contactus.php"><span class="glyphicon glyphicon-bell"> ContactUs</span></a></li>
                <li><a href="../aboutus.php"><span class="glyphicon glyphicon-user"> AboutUs</span></a></li>
                <a href="../index.php"><button class="btn btn-primary" >Logout</button></a>

            </ul>

        </div>

        <br>




        <div class="container">

            <div class="col-lg-4">
                <h4>Hospital</h4>
                <select id="SRC_ADDR" class="selectpicker">
                    <option value="colombo" class="text-primary">Colombo Medi Spot (Pvt) Ltd</option>
                    <option value="maharagama" class="text-primary">Health watch (Pvt) Ltd</option>
                    <option value="athurugiriya" class="text-primary">Blue Cross Medical Center (Pvt) Ltd</option>
                </select>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <h4>Current Position</h4>
                <input id="DST_ADDR" type="textbox" placeholder="Your current location" class="text-primary">
                <input type="button" value="Track" onclick="codeAddress()" class="btn btn-danger">
            </div>
        </div>
        
        
        <div  class="col-lg-12" id="map_canvas" style=" alignment-adjust: auto;left: 10%; right: 10%;height:80%;width:80%;top:50px " ></div>
        <!-- <div id="map_canvas" style="width: 320px; height: 480px;"></div> 
        -->
        


    </body>
</html>