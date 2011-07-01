var map = new google.maps.Map(document.getElementById('venue-map'), {
  center: new google.maps.LatLng(51, 0),
  zoom: 6,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  disableDefaultUI: true
});


var standardIcon =  new google.maps.MarkerImage(
 '/images/map-markers.png',
 new google.maps.Size(29, 39, 'px', 'px'),
 new google.maps.Point(0,0),
 new google.maps.Point(16, 39)
);

var hoverIcon =  new google.maps.MarkerImage(
 '/images/map-markers.png',
 new google.maps.Size(29, 39, 'px', 'px'),
 new google.maps.Point(0,39),
 new google.maps.Point(16, 39)
);


var venue1 = document.getElementById('1');

var marker1 = new google.maps.Marker({
  position: new google.maps.LatLng(51.1, 0),
  flat: true,
  icon: standardIcon
});


marker1.setMap(map);

google.maps.event.addListener(marker1, 'mouseover', function() {
  hoverIconAction(true);
});

google.maps.event.addListener(marker1, 'mouseout', function() {
  hoverIconAction(false);
});

var hoverIconAction = function (hover) {
  if (hover){
    marker1.setIcon(hoverIcon);
    venue1.setAttribute('class','selected');  
  } else {
    marker1.setIcon(standardIcon)    
    venue1.setAttribute('class','');
  }
}



venue1.onmouseover = function () {
  hoverIconAction(true);
}
venue1.onmouseout = function () {
  hoverIconAction(false);
}