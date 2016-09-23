var map;

//顯示地圖(最主要的)
function initMap() 
{
	//建立初始位置
	var myLatLng = {lat: 24.163669, lng: 120.637566};

	//製作地圖+顯示
	mapOptions = {
		center: myLatLng,
		zoom: 14,
		//mapTypeId: google.maps.MapTypeId.SATELLITE,
   		//heading: 90,
		//tilt: 45
	};
	map = new google.maps.Map(document.getElementById('map'),mapOptions);

	//添加標記
	var marker = new google.maps.Marker({
	 	position: myLatLng,
		map: map,
		title: 'Hello World!'
 	});

	//建立新物件
	var geocoder = new google.maps.Geocoder();
	//按下按鈕後，去執行geocodeAddress這一個function
	document.getElementById('submit').addEventListener('click', function() {
		geocodeAddress(geocoder, map);
	});

	//建立指定的區塊(可以用在選取上)
	/*var triangleCoords = [
	    	{lat: 25.774, lng: -80.19},
	    	{lat: 18.466, lng: -66.118},
	    	{lat: 32.321, lng: -64.757}
  	];*/
  	var myposition = [];

  	//畫線(尚未取道自己的位置)
	var region = new google.maps.Polygon({
		paths: myposition,
		strokeOpacity:0.8,
		strokeColor:'#FF0000',
		strokeWeight: 2,
  		fillColor: '#FF0000',
    		fillOpacity: 0.35,
		map:map
	});

	//確定是否點有落在內部?
	/*if(google.maps.geometry.poly.containsLocation(e.latLng, region)){
		return true;
	}*/

	//增加標記
	google.maps.event.addListener(map, 'click', function(e) {

	    	new google.maps.Marker({
	      		position: e.latLng,
	      		map: map,
		});
	});
}

//添加用地址查詢的功能
function geocodeAddress(geocoder, resultsMap) 
{
	var address = document.getElementById('address').value;
	geocoder.geocode({'address': address}, function(results, status)
	{
		if (status === google.maps.GeocoderStatus.OK)
		{
			resultsMap.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker(
			{
				map: resultsMap,
				position: results[0].geometry.location
			});
		} else {
		alert('Geocode was not successful for the following reason: ' + status);
		}
	});
}
