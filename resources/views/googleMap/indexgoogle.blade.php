@extends('welcome')
@section('content')

<body >
	<p>
	<div id="map" class="w3-center " style="min-height: 600px; width: 600px"></div>
	</p>

	<div id="floating-panel"  class="w3-center ">
		<input id="address" type="textbox" value="請輸入你的地址">
		<input id="submit" type="button" value="Geocode">
	</div>

<script src="{{ url('map.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxAWsEr_pkAUEViFnL_r3eLJiIheQKdKA&callback=initMap&libraries=places"></script>

</body>

@endsection
