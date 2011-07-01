function newHoverIconAction(el, latlng, marker, standardIcon, hoverIcon) {
  return function (event) {
    if (event.type === 'mouseover') {
      marker.setZIndex(zIndex++);
      marker.setIcon(hoverIcon);
      addClass(el, 'selected');
      // don't use the pageX - just using it to determine that we hovered from the li, not a google hover
      if (event.pageX) map.panTo(latlng);
    } else {
      marker.setIcon(standardIcon);
      removeClass(el, 'selected');
    }
  };
}

function each(els, fn) {
  var i = els.length;
  while (i--) {
    fn.call(els[i], els[i]);
  }
}

function addClass(el, c) {
  var className = el.className;
  
  if ((' ' + className + ' ').indexOf(' ' + c + ' ') !== false) {
    // add
    el.className = className + ' ' + c;
  }
}

function removeClass(el, c) {
  el.className = (' ' + el.className + ' ').replace(c, '');
}

var iconSize = new google.maps.Size(29, 39, 'px', 'px'),
    iconPoint = new google.maps.Point(16, 39),
    iconURL = '/images/map-markers.png',
    iconWidth = 29,
    map = new google.maps.Map(document.getElementById('venue-map'), {
      center: new google.maps.LatLng(50.8339238, -0.1385427),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }),
    lis = document.getElementById('associated-venues').getElementsByTagName('li'),
    len = lis.length,
    bounds = new google.maps.LatLngBounds(),
    doyLocation = new google.maps.LatLng(50.8336812, -0.1388816),
    zIndex = google.maps.Marker.MAX_ZINDEX;
    
var doyIcon = new google.maps.Marker({
  position: doyLocation,
  flat: true,
  icon: new google.maps.MarkerImage(
    iconURL,
    new google.maps.Size(51, 69, 'px', 'px'),
    new google.maps.Point(261, 0),
    new google.maps.Point(26, 69)
  )
}).setMap(map);

bounds.extend(doyLocation);
    
for (var i = 0; i < len; i++) {
  !function (i) {
    var el = lis[i],
        latlng = el.getAttribute('data-latlng').split(','),
        venueLocation = new google.maps.LatLng(latlng[0], latlng[1]),
        standardIcon = new google.maps.MarkerImage(
          iconURL,
          iconSize,
          new google.maps.Point(i * iconWidth, 0),
          iconPoint
        ),
        hoverIcon = new google.maps.MarkerImage(
          iconURL,
          iconSize,
          new google.maps.Point(i * iconWidth, 39),
          iconPoint
        ),
        marker = new google.maps.Marker({
          position: venueLocation,
          flat: true,
          icon: standardIcon
        }),
        hoverIconAction = newHoverIconAction(el, venueLocation, marker, standardIcon, hoverIcon);

    bounds.extend(venueLocation);
    
    // event handlers - sweeeeeeet HAWT ::rasp::
    google.maps.event.addListener(marker, 'mouseover', function () {
      hoverIconAction({ type: 'mouseover' });
    });
    google.maps.event.addListener(marker, 'mouseout', function () {
      hoverIconAction({ type: 'mouseout' });
    });
    // google.maps.event.addListener(marker, 'click', function () {
    //   each(lis, function (el) {
    //     removeClass(el, 'highlighted');
    //   });
    //   addClass(el, 'highlighted');
    // });
    el.onmouseover = hoverIconAction;
    el.onmouseout = hoverIconAction;
    
    marker.setMap(map);
  }(i);
}

map.fitBounds(bounds);
