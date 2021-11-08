<?php 
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Tugas SIG</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="src/js/leaflet.ajax.js"></script>
</head>
<body>
    <div class="header">
        <h1>Peta Distribusi Rumah Sakit di Kota Bandar Lampung</h1>
        <h3>by Muhammad Khoirurrizqi</h3>
    </div>
    <div class="content">
        <div id="map" style="width: 900px; height: 600px;"></div>
    </div>
<style>
    body{
        background-color: darkslategrey;
        color: white;
    }
    .header{
        text-align: center;
        margin-bottom: 25px;
    }
    .content{
        justify-content: center;
        display: flex;
    }
    .header h1, .header h3{
        margin: 0px;
        font-weight: bold;
    }
</style>
<script>

    // Map
	var mymap = L.map('map').setView([-5.361769, 105.280742], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    // my position
    var redIcon = new L.Icon({
        iconUrl: 'src/marker-icon-2x-red.png',
        shadowUrl: 'src/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

	L.marker([-5.364977, 105.280320], {icon: redIcon}).addTo(mymap)
	.bindPopup("<b>Lokasiku!</b><br />Rizqi right here.").openPopup();

    //RS
    function popUp(f,l){
        var out = [];
        if (f.properties){
            for(key in f.properties){
                out.push(key+": "+f.properties[key]);
            }
            l.bindPopup(out.join("<br />"));
        }
    }
    var jsonTest = new L.GeoJSON.AJAX(["point.geojson"],{onEachFeature:popUp}).addTo(mymap);
</script>



</body>
</html>
