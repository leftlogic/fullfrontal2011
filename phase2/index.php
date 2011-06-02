<?php
$thanks = false;
$error = false;
$email = '';

function validEmail($e) {
  return (preg_match("/^([_a-z0-9-\+]+(\.[_a-z0-9-\+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4}))$/", $e));
}

if (isset($_POST['email']) && $_POST['email'] && validEmail($_POST['email'])) {
  $email = $_POST['email'];
  $fp = fopen('emails.txt', 'a+');
  fwrite($fp, $email . "\n");
  fclose($fp);
  $thanks = true;
} else if (isset($_POST['email'])) {
  $error = true;
}
?><!DOCTYPE html> 
<html id="home">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Frontal 2011- JavaScript Conference</title>
  
  <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Cabin+Sketch:bold' />
  <link rel="stylesheet" href="fullfrontal.css" />
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>
<!--[if lte IE 8]><body class="ie nomediaquerygoodnessyepisuck"><![endif]-->
<!--[if gt IE 8]><!--><body><!--<![endif]-->
    <header>
      <h1 class="full-frontal">Full Frontal</h1> 
      <time datetime="2011-11-11T09:00:00Z">11.11.11</time>
      <h2>JavaScript <br /> <span>Conference</span></h2>
      <h3>Duke Of Yorks, Brighton, <br /> 11th November 2011</h3>
    </header>
    
    <form action="/" method="post">
      <label for="email">Enter your email address below to get updated on Full Frontal 2011</label>
      <p>
        <input type="email" id="email" name="email" placeholder="Enter your email for updates..." />
        <button type="submit"><span>Go</span></button>
      </p>
    </form>
    
    <div class="want-to">
      <section class="speak">
        <h1>Want to<br />speak?</h1>
        <p>
          Want to speak at Full Frontal 2011? We'd love to give you the platform to speak to hundreds of
          developers and designers, so what are you waiting for, <a href="mailto:events@leftlogic.com?subject=FF2011%20Speaking%20Proposal">get in touch!</a>
        </p>
      </section>
    
      <section class="sponsor">
        <h1>Want to<br />sponsor?</h1>
        <p>
          Find out how your company can sponsor Full Frontal by reviewing our
          <a href="/sponsorship.html">sponsorship packages</a> and <a href="mailto:events@leftlogic.com?subject=FF2011%20Sponsorship">get in touch</a> with us to discuss
          how we can work together.
        </p>
      </section>
    </div>
    
    <div class="tweets">
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
        <p><?=(htmlentities($fav->text))?></p>
        <cite><a href="http://twitter.com/<?=$fav->user->screen_name?>"><img width="30" height="30" src="<?=$fav->user->profile_image_url?>" alt="<?=$fav->user->screen_name?>"></a><a href="http://twitter.com/<?=$fav->user->screen_name?>/statuses/<?=$fav->id_str?>"><?=$fav->user->screen_name?></a></cite>
      </blockquote></div>
<?php endfor ?>
      
      <div class="clear"></div>
    </div>
    
    <p class="follow">Follow <a href="https://twitter.com/fullfrontalconf">@FullFrontalConf</a> <br/> for tickets &amp; news</p>
    
    <footer>
      <h1><a href="http://leftlogic.com">Left Logic</a></h1>
      <p>Full Frontal is a one day conference organised by Left Logic - <a href="terms.html">Terms &amp; Conditions</a></p>
      <p>Previous Years &ndash; <a href="http://2009.full-frontal.org">2009</a> &amp; <a href="http://2010.full-frontal.org">2010</a></p>
    </footer>
    
<script>
  // Google Analytics
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1656750-25']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body> 
</html>
