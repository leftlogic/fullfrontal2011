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
  header('location: /?thanks');
} else if (isset($_POST['email'])) {
  $error = true;
} else if (isset($_GET['thanks'])) {
  $thanks = true;
}
?><!DOCTYPE html> 
<html<?=$thanks?' class="thanks"':''?>>
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
  <div class="wrapper">
    <header>
      <h1 class="full-frontal">Full Frontal</h1> 

      <h2>JavaScript <br /> <span>Conference</span></h2>
      <h3>Duke Of Yorks, Brighton, <br /> <time datetime="2011-11-11T09:00:00Z">11th November 2011</time></h3>
    
      <a href="" class="tickets">
        Earlybird <br />
        1 dat &pound;129+ <abbr>VAT</abbr> <br />
        <span>Buy tickets</span>
      </a>
    </header>
    
    <nav>
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Speakers</a></li>
        <li><a href="">Schedule</a></li>
        <li><a href="">The Venue</a></li>
        <li><a href="">Sponsors</a></li>
      </ul>
    </nav>
    
    <hgroup>
      <h1>Full Frontal</h1>
      <h2>Javascript Conference<h2>
    </hgroup>
    
    <div class="list-speakers">    
      <ul>
        <li><a href="">Paul Rouget</a></li>
        <li><a href="">Brian Leroux</a></li>
        <li><a href="">Dan Webb</a></li>
        <li><a href="">Alex Russell</a></li>
        <li><a href="">Jan Lehnardt</a></li>
        <li><a href="">Seb Lee-Delisle</a></li>
        <li><a href="">Paul Bakhaus</a></li>
      </ul>
    
      <h3>Duke Of Yorks, Brighton, <br /> 11th November 2011</h3>
    
      <div class="image-cube">
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
        <img src="" width="" height="" alt="" />
      </div>
    </div>

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
    </div><!-- .tweets -->
    
    <h1>Schedule</h1>
    
    <ol class="schedule">
      <li>
        <span class="timeslot">
          <time>09:00</time> &emdash; <time></time>
        </span>
        <section>
          <h1>Registration<h1>
        </section>
      </li>
      
      <li>
        <span class="timeslot">
          <time>09:00</time> &emdash; <time></time>
          <a href="">Alex Russel</a>
        </span>
        <img src="" width="" height="" alt="" />
        <section>
          <h1>Less and more: How HTML5 will change the framework landscape<h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </section>
      </li>
    </ol>
    
    <h1>Speakers</h1>
    
    <section>
      <h1><span class="number"></span>Brendan Dawes</h1>
      <img src="" width="" height="" alt="" />
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
      </p>
    </section>
    
    <h1>Sponsors</h1>
    
    <h2>
      Full Frontal
      is proudly
      sponsored by
    </h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    
    <section class="sponsor full">
      <a href=""><h1><img src="" width="" height="" alt="Mozilla" /></h1></a>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </section>
    
    <section class="sponsor half">
      <h1>Half Monties
        <a href="">Become a Half Monty sponsor</a>  
      </h1>
      <a href=""><img src="" width="" height="" alt="" /></a>
      <a href=""><img src="" width="" height="" alt="" /></a>
      <a href=""><img src="" width="" height="" alt="" /></a>
    </section>
    
    <section class="sponsor small">
      <h1>Small Monties
        <a href="">Become a Small Monty Sponsor</a>
      <h1>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a class="available" href=""><img src="" width="" height="" alt="" /></a>
    </section>
    
    <section class="sponsor media">
      <h1>Media Partners
        <a href="">Become a Media Partner</a>
      </h1>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a href=""><img src="" width="" height="" alt="" /></a>
        <a class="available" href=""><img src="" width="" height="" alt="" /></a>
        <a class="available" href=""><img src="" width="" height="" alt="" /></a>
        <a class="available" href=""><img src="" width="" height="" alt="" /></a>
    </section>
    
   
    
  </div><!-- .wrapper -->
<?php include('footer.php'); ?>