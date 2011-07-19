!function () {

var updates = document.getElementById('updates');

twitterlib.render = function (tweet) {
  return '<p>' + twitterlib.ify.clean(tweet.text) + '<br><a href=http://twitter.com/' + tweet.user.screen_name + '/status/' + tweet.id_str + '><time datetime=' + tweet.created_at + '>' + twitterlib.time.relative(tweet.created_at) + '</time></a></p>';
};

twitterlib.timeline('fullfrontalconf', { limit: 2, rts: true }, function (tweets) {
  var html = '';
  for (var i = 0; i < tweets.length; i++) {
    html += twitterlib.render(tweets[i]);
  }
  
  updates.innerHTML = html;
});

/mobile/i.test(navigator.userAgent) && !location.hash && setTimeout(function () {
  if (!pageYOffset) window.scrollTo(0, 1);
}, 1000);

if (document.getElementById('speakers')) {
  // speakers page
  var sections = document.getElementsByTagName('section'),
      speakers = [],
      i = sections.length,
      visible = null,
      test = null;
      
  while (i--) {
    test = (' ' + sections[i].className + ' ');
    if (test.indexOf(' speaker ') !== -1 && test.indexOf(' want-to ') === -1 && sections[i].getElementsByTagName('p')[0].getElementsByTagName('span').length) {
      !function (i) {
        var speaker = sections[i],
            div = document.createElement('div'),
            more = document.createElement('a'),
            image = speaker.getElementsByTagName('img')[0];
            
        div.className = 'clone';
        div.appendChild(speaker.cloneNode(true));
        speaker.appendChild(div);

        more.innerHTML = 'More &raquo;';
        more.href = '#' + speaker.id;
        
        var click = function (event) {
          // event = event || window.event;
          // event.preventDefault && event.preventDefault();
          visible = speaker;
          each(speakers, function (el) {
            removeClass(el, 'spotlight');
          });
          addClass(speaker, 'spotlight');
          // return false;
        };
        
        speaker.onclick = click; // more.onclick = 
        
        // lame - but a good reason for it - sorry folks
        if (location.hash.substr(1) == speaker.id) {
          click.call(more, {});
        }
        
        var firstP = speaker.getElementsByTagName('p')[0];
        firstP.appendChild(document.createTextNode(' '));
        firstP.appendChild(more);
        speakers.push(speaker);
      }(i);
    }
  }
  
  document.onkeydown = function (event) {
    event = event || window.event;
    var which = event.which || event.keyCode;
    if (which === 27 && visible !== null) { // esc
      event.preventDefault && event.preventDefault();
      each(speakers, function (el) {
        removeClass(el, 'spotlight');
      });
      return false;
    } 
  };
}

}();

var addEvent = (function () {
  if (document.addEventListener) {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.addEventListener(type, fn, false);
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  } else {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.attachEvent('on' + type, function () { return fn.call(el, window.event); });
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  }
})();


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

// thank you jQuery...
var triml = /^\s+/,
	  trimr = /\s+$/;

function removeClass(el, c) {
  el.className = (' ' + el.className + ' ').replace(' ' + c + ' ', '').replace(triml, '').replace(trimr, '');
}
