@extends('welcome')
@section('content')

<body >
	<p>
	<div id="map" class="w3-center " style="min-height: 500px; width: 600px"></div>
	</p>

	<p>
	<div id="message"  class="w3-center " style="min-height: 100px; width: 600px"></div>
	</p>

	<div id="floating-panel"  class="w3-center ">
		<input id="address" type="textbox" value="請輸入你的地址">
		<input id="submit" type="button" value="Geocode">
		<input id="Coordinate" type="button" value="顯示座標" onclick="display()">
	</div>

<script src="{{ url('map.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxAWsEr_pkAUEViFnL_r3eLJiIheQKdKA&callback=initMap&libraries=places, geometry"></script>

</body>

@endsection
