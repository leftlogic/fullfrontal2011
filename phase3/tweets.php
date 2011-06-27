    <div class=tweets>
<?php
function linkify($text) {
  // note - this order is important, i.e. links at the top, then anything else
  $matches = array(
    '/([A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+)/',
    '/(^|[^\w])(#[\d\w\-]+)/',
    '/(^|[^\w])(@([\d\w\-]+))/'
  );
  
  $replacements = array(
    '<a href="$1">$1</a>',
    '$1<a href="http://search.twitter.com/search?q=$2">$2</a>',
    '$1@<a href="http://twitter.com/$3">$3</a>'
  );
  
  return preg_replace($matches, $replacements, $text);
}


$favs_raw = json_decode(file_get_contents('./fullfrontalconf.json'));
$favs = array();

// remove old tweets
foreach ($favs_raw as $fav) {
  if (stripos($fav->created_at, '2010')) {
    array_push($favs, $fav);
  }
}

shuffle($favs);

for ($i = 0; $i < 5; $i++) : $fav = $favs[$i]; ?>
      <div><blockquote cite="http://twitter.com/<?=$fav->user->screen_name?>/statuses/<?=$fav->id_str?>">
        <p><?=(htmlentities($fav->text))?>
        <cite><a href="http://twitter.com/<?=$fav->user->screen_name?>"><img width=30 height=30 src="<?=$fav->user->profile_image_url?>" alt="<?=$fav->user->screen_name?>"></a><a href="http://twitter.com/<?=$fav->user->screen_name?>/statuses/<?=$fav->id_str?>"><?=$fav->user->screen_name?></a></cite>
      </blockquote></div>
<?php endfor ?>
      
      <div class=clear></div>
    </div><!-- .tweets -->