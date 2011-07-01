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