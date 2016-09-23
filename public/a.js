Skip to content
This repository
Search
Pull requests
Issues
Gist
 @neil605164
 Watch 1
  Star 0
  Fork 0 yam8511/Quser2
 Code  Issues 0  Pull requests 0  Projects 0  Wiki  Pulse  Graphs
Branch: master Find file Copy pathQuser2/public/js/myMap.js
5ed4357  15 days ago
@yam8511 yam8511 finish
1 contributor
RawBlameHistory     
185 lines (159 sloc)  4.19 KB
var markers = [];
var map = null;
var myPoints = [];
var myRegion = null;

function initMap(lat = 24.163669, lng = 120.637566)
{
	var myPosition =  new google.maps.LatLng(lat, lng);
	var image = {
	    url: 'gps.png',
	    scaledSize: new google.maps.Size(60, 60),
	};
	
	/*** 製作地圖 ***/
	var mapProp = {
		center: myPosition,
		zoom:18,
		mapTypeId:google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false
	};

	map = new google.maps.Map(document.getElementById('map'), mapProp);

	/*** 顯示自訂介面 ***/
	var searchBar = document.getElementById('searchBar');
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchBar);





	myPoints = [];
    	myRegion = new google.maps.Polygon({
        	paths: myPoints,
        	fillColor: '#4fe',
        	fillOpacity: 0.5,
        	strokeColor: 'white',
        	strokeWeight: 0.5,
        	map:map
      	});

google.maps.event.addListener(map, 'click', setRegion);
}


function display()
{
	var message = document.getElementById('message');

	if (myPoints.length === 0) { message.innerHTML = ''; return;}
	var output = '<div class="w3-example"><h3>項點座標</h3><div class="w3-code jsHigh notranslate">[<ul style="list-style-type:none">';
	for(var i in myPoints)
	{
		output += "<li>{ x: '" + myPoints[i].lat + "', y: '" + myPoints[i].lng + "' },</li>"
	}

	output += '</ul>]</div></div>';
	message.innerHTML = output;
}
