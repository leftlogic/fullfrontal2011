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