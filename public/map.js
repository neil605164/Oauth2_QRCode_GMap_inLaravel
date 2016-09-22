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
