var map;
var myposition = [];
var region;

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


  	//畫線
	region = new google.maps.Polygon({
		paths: myposition,
		strokeOpacity:0.8,
		strokeColor:'#FF0000',
		strokeWeight: 2,
  		fillColor: '#FF0000',
    		fillOpacity: 0.35,
		map:map
	});

	//增加標記
	google.maps.event.addListener(map, 'click', function(e) {

		//排除在選取範圍內的(只在範圍內的不得選取)
		if(google.maps.geometry.poly.containsLocation(e.latLng, region)){
			return ;
		}

		//取點選的標記
		myposition.push(e.latLng.toJSON());

		//將圖形清除，併重新繪新的圖形
		if(region){
			 region.setMap(null);
		}

		//給region一個固定的形式
	    	region = new google.maps.Polygon({
			paths: myposition,
		        	fillOpacity: 0.3,//指定透明度0.0-1.0
		        	fillColor: 'green',//指定填滿的顏色
		        	strokeColor: 'white',//線的顏色
		        	strokeWeight: 0.5,//線的粗細0.0-1.0
		        	map:map
	    	});
		

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



//按下id為coordinate的按鈕後，去執行display這一個function
document.getElementById('Coordinate').addEventListener('click', function() {
		display();
	});

//顯示經緯度
function display()
{

	var message = document.getElementById('message');

	//判定是否有標記
	if (myposition.length === 0) { 
		message.innerHTML = ''; return ;
	}
	
	//列印經緯度
	for(var i = 0; i < myposition.length; i++)
	{
		message.innerHTML += "[ x: '" + myposition[i].lat + "', y: '" + myposition[i].lng + "' ]<br>";
	}
}

