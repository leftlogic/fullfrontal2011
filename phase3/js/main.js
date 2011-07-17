!function () {

var updates = document.getElementById('updates');

twitterlib.render = function (tweet) {
  return '<p>' + twitterlib.ify.clean(tweet.text) + '<br><a href=http://twitter.com/' + tweet.user.screen_name + '/status/' + tweet.id_str + '><time datetime=' + tweet.created_at + '>' + twitterlib.time.relative(tweet.created_at) + '</time></a></p>';
};

twitterlib.timeline('fullfrontalconf', { limit: 2 }, function (tweets) {
  var html = '';
  for (var i = 0; i < tweets.length; i++) {
    html += twitterlib.render(tweets[i]);
  }
  
  updates.innerHTML = html;
});

if (document.getElementById('speakers')) {
  // speakers page
  var sections = document.getElementsByTagName('section'),
      speakers = [],
      i = sections.length,
      visible = null,
      test = null;
      
  while (i--) {
    test = (' ' + sections[i].className + ' ');
    if (test.indexOf(' speaker ') !== -1 && test.indexOf(' want-to ') === -1) {
      !function (i) {
        var speaker = sections[i],
            div = document.createElement('div'),
            more = document.createElement('a');
            
        div.className = 'clone';
        // var inner = document.createElement('section');
        // inner.className = 'speaker';
        // div.appendChild(inner);
        // inner.innerHTML = speaker.innerHTML;
        div.appendChild(speaker.cloneNode(true));
        speaker.appendChild(div);

        more.innerHTML = 'More &raquo;';
        more.href = '#' + speaker.id;
        
        more.onclick = function (event) {
          event = event || window.event;
          // event.preventDefault && event.preventDefault();
          visible = speaker;
          each(speakers, function (el) {
            removeClass(el, 'spotlight');
          });
          addClass(speaker, 'spotlight');          
          // return false;
        };
        
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
    if (which === 27 && visible !== null || location.hash) { // esc
      event.preventDefault && event.preventDefault();
      each(speakers, function (el) {
        removeClass(el, 'spotlight');
      });
      location.hash = '';
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

function removeClass(el, c) {
  el.className = (' ' + el.className + ' ').replace(' ' + c + ' ', '');
}
