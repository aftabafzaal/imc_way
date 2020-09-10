@extends('layouts.home')
@section('content')
@php
	$url=Request::segment(1);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}

	@endphp
	<?php

	if(!empty(Request::segment(3))){
		 $lat = Request::segment(3);
	}else{
		 $lat ="21.5135";
	}
	if(!empty(Request::segment(4))){
		$lng =Request::segment(4);
 }else{
		$lng ="39.17415";
 }

	?>
<link href="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
<style>
	/* Always set the map height explicitly to define the size of the div
		* element that contains the map. */
	#map {
		height: 100%;
	}

	/* Optional: Makes the sample page fill the window. */
	html,
	body {
		height: 100%;
		margin: 0;
		padding: 0;
	}

	#floating-panel {
		position: absolute;
		top: 10px;
		left: 25%;
		z-index: 5;
		background-color: #fff;
		padding: 5px;
		border: 1px solid #999;
		text-align: center;
		font-family: 'Roboto', 'sans-serif';
		line-height: 30px;
		padding-left: 10px;
	}

	#warnings-panel {
		width: 100%;
		height: 10%;
		text-align: center;
	}

	.distance_label{
		font-size: 20px;
		color: #FFF;
		font-family: cursive;
	}
</style>
<!--banner start here-->
<?php
$helper = new App\Helpers();
$getpage=$helper->getPagedata('location');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')

<!--banner ends here-->
<!-- main section start here-->
<section class="location">
	<div class="container">
		<h3>{{($language == "en")?$location_content['section_1']['title_en']:$location_content['section_1']['title_ar']}}</h3>
		<p class="m-0">
			{!! ($language == "en")?$location_content['section_1']['description_en']:$location_content['section_1']['description_ar'] !!}
		</p>
	</div>
	<div class="map-block">
		<div class="mapouter" style="{{($language == "ar")?"margin-right: 18%;":""}}">
			<div class="gmap_canvas">
				<div id="map"></div>
				&nbsp;
				<div id="warnings-panel"></div>
			</div>

	      <input id="start" value="International Medical Center
				الرويس، 4238 نور الهدي - حي - 6803،
				Jeddah 23214
				Saudi Arabia">
			<select multiple id="waypoints">
			</select>
			<br>
			<b>End:</b>
			<select id="end">
			</select>


		</div>
		<div class="searchbar-block wow fadeInRight">
			<h5>{!!($language == "en")?"Find Direction":"البحث عن الاتجاه"!!}</h5>
			<div class="search-input">
				<input type="text" id="submit" placeholder="{{($language == 'en')?'Enter Your Location':'أدخل موقعك'}}" required>
				<i id="getDirection" class="fa fa-search" aria-hidden="true"></i>
			</div>
			<div class="search-own">
				<a href="javascript:void(0)" onclick="getCurrentLocation();">
					<i class="fa fa-location-arrow" aria-hidden="true"></i>
					<p>{!!($language == "en")?"Use Your Current Location":"استخدام موقعك الحالي"!!}</p>
				</a>
			</div>
			<div class="map-address-newsec">
				<h5>{{($language == "en")?$location_content['section_2']['title_en']:$location_content['section_2']['title_ar']}}</h5>
				{!! ($language == "en")?$location_content['section_2']['description_en']:$location_content['section_2']['description_ar'] !!}
			</div>
			<div style="margin-top:35px">
				<hr style="border-color: white;border-style: dashed;">
				<span class="distance_label">{!!($language == "en")?"Total Distance : ":"المسافة الكلية :"!!}</span>
				<span id="total" class="distance_label" > 0 </span>
				<!-- <span class="distance_label">{!!($language == "en")?"KM":"كم"!!}</span> -->
			</div>
		</div>
	</div>
</section>
<!-- main section ends here-->
<!--need-block start here-->
@include('layouts.lookexpert')
<!--need-block ends here-->
@endsection
@section('script')
<script src="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/custom/js/vendors/sweetalert2.init.js') }}" type="text/javascript"></script>
<!-- <script>
	function initMap() {
		var markerArray = [];
		var directionsService = new google.maps.DirectionsService;
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 17,
			center: { lat: 21.5128584, lng: 39.1788177 }
		});

		var directionsRenderer = new google.maps.DirectionsRenderer({
				draggable: true,
				map: map,
				panel: document.getElementById('right-panel')
			});

		directionsRenderer.addListener('directions_changed', function () {
			computeTotalDistance(directionsRenderer.getDirections());
		});

		var stepDisplay = new google.maps.InfoWindow;

		var onChangeHandler = function () {
			if(document.getElementById('destination').value !=""){
			calculateAndDisplayRoute(
				directionsRenderer, directionsService, markerArray, stepDisplay, map);
			}else{
				swal.fire({
					title: 'Required',
					text: "Destination place is required",
					type: 'error',
					buttonsStyling: false,
					confirmButtonText: "OK",
					confirmButtonClass: "btn btn-sm btn-bold btn-brand",
				});
			}
		};

		document.getElementById('getDirection').addEventListener('click', onChangeHandler);
		document.getElementById('destination').addEventListener('change', onChangeHandler);
	}

	function computeTotalDistance(result) {
		var total = 0;
		var myroute = result.routes[0];
		for (var i = 0; i < myroute.legs.length; i++) {
			total += myroute.legs[i].distance.value;
		}
		total = total / 1000;
		document.getElementById('total').innerHTML = total;
	}

	function calculateAndDisplayRoute(directionsRenderer, directionsService,
		markerArray, stepDisplay, map) {
		for (var i = 0; i < markerArray.length; i++) {
			markerArray[i].setMap(null);
		}

		directionsService.route({
			origin: "International Medical Center, Al-Ruwais, Jeddah 23214, Saudi Arabia.",
			destination: document.getElementById('destination').value,
			travelMode: 'DRIVING'
		}, function (response, status) {
			if (status === 'OK') {
				document.getElementById('warnings-panel').innerHTML =
					'<b>' + response.routes[0].warnings + '</b>';
				directionsRenderer.setDirections(response);
				showSteps(response, markerArray, stepDisplay, map);
			} else {
				swal.fire({
					title: 'Required',
					text: "Directions request failed due to " + status,
					type: 'error',
					buttonsStyling: false,
					confirmButtonText: "OK",
					confirmButtonClass: "btn btn-sm btn-bold btn-brand",
				});
			}
		});
	}

	function showSteps(directionResult, markerArray, stepDisplay, map) {
		var myRoute = directionResult.routes[0].legs[0];
		for (var i = 0; i < myRoute.steps.length; i++) {
			var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
			marker.setMap(map);
			marker.setPosition(myRoute.steps[i].start_location);
			attachInstructionText(
				stepDisplay, marker, myRoute.steps[i].instructions, map);
		}
	}

	function attachInstructionText(stepDisplay, marker, text, map) {
		google.maps.event.addListener(marker, 'click', function () {
			stepDisplay.setContent(text);
			stepDisplay.open(map, marker);
		});
	}

	function getCurrentLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var lat = position.coords.latitude;
				var lng = position.coords.longitude;
				var geocoder = new google.maps.Geocoder();
				var latlng = new google.maps.LatLng(lat, lng);
				geocoder.geocode({ 'latLng': latlng }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						$("#destination").val(results[0]['formatted_address']);
						$("#destination").trigger("change");
					};
				});
			});
		};
	}
</script> -->

<script>
function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
	var myLatLng = { lat: <?php echo $lat;?>, lng: <?php echo $lng;?> }

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: myLatLng
  });

     var myLatLng = { lat: <?php echo $lat;?>, lng: <?php echo $lng;?> }
    	var marker = new google.maps.Marker({
    	position: myLatLng,
    	map: map,
      });

  directionsDisplay.setMap(map);

	$('#submit').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
			var input= 	$("#submit").val();
			calculateAndDisplayRoute(directionsService, directionsDisplay);
    }
});

	$("#getDirection").click(function(){
	 var input= 	$("#submit").val();
	 calculateAndDisplayRoute(directionsService, directionsDisplay);
	});



}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var waypts = [];
  var checkboxArray = document.getElementById('waypoints');
  for (var i = 0; i < checkboxArray.length; i++) {
    if (checkboxArray.options[i].selected) {
      waypts.push({
        location: checkboxArray[i].value,
        stopover: true
      });
    }
  }

  directionsService.route({
    origin: document.getElementById('start').value,
    destination: document.getElementById('submit').value,
    waypoints: waypts,
    optimizeWaypoints: true,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
      console.log(route);
      var summaryPanel = document.getElementById('total');
      
      summaryPanel.innerHTML = '';
      // For each route, display summary information.
      for (var i = 0; i < route.legs.length; i++) {
        var routeSegment = i + 1;
        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
      }
    } else {
			swal.fire({
				title: 'Required',
				text: "Directions request failed due to " + status,
				type: 'error',
				buttonsStyling: false,
				confirmButtonText: "OK",
				confirmButtonClass: "btn btn-sm btn-bold btn-brand",
			});

    }
  });
}

google.maps.event.addDomListener(window, 'load', initMap);

</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGAyiRaUhA8cntur2DvcZtcTG0VGDEer0&callback=initMap">
</script>
@endsection
