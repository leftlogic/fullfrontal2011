var map = new google.maps.Map(document.getElementById('venue-map'), {
  center: new google.maps.LatLng(51, 0),
  zoom: 6,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  disableDefaultUI: true
});

var standardMarker = {
  location: '/images/map-markers.png',
  size: new google.maps.Size(29, 39, 'px', 'px'),
  anchor: new google.maps.Point(16, 39)
}

var marker = new google.maps.Marker({
  position: new google.maps.LatLng(51.1, 0),
  flat: true,
  icon: new google.maps.MarkerImage(
    standardMarker.location,
    standardMarker.size,
    new google.maps.Point(0,0),
    standardMarker.anchor
  )
});

marker.setMap(map);