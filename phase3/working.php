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
?>

<!DOCTYPE html> 
<html<?=$thanks?' class=thanks':''?>>
<head>
  <meta charset=utf-8>
  <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
  <meta name=viewport content="width=device-width, initial-scale=1.0">
  <title>Full Frontal 2011- JavaScript Conference</title>

  <link rel=stylesheet href=fullfrontal.css>
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
<!--[if lte IE 8]><body class="ie nomediaquerygoodnessyepisuck"><![endif]-->
<!--[if gt IE 8]><!--><body><!--<![endif]-->
  <div class=wrapper>
    <header>
      <h1 class=full-frontal>Full Frontal</h1> 
      
      <hgroup>
        <h2>JavaScript <br> <span>Conference</span></h2>
        <h3>Duke Of Yorks, Brighton, <br> <time datetime=2011-11-11T09:00:00Z>11th November 2011</time></h3>
      </hgroup>
    
      <a href=# class="buy-tickets early-bird">
        Earlybird<br>
        <span>1 day &pound;99+ <abbr>VAT</abbr></span><br>
        <span class=buy-button><img src=images/buy-tickets width=278 height=48 alt="Buy Tickets"></span>
      </a>
      
      <!--
      
      <a href=# class="buy-tickets buy-now">
        Buy Now<br>
        <span>1 day &pound;129+ <abbr>VAT</abbr></span><br>
        <span class=buy-button><img src=images/buy-tickets width=278 height=48 alt="Buy Tickets"></span>
      </a>
            
      <span class="buy-tickets sold-out">Sold Out</span>
      
      -->
      
    </header>
    
    <nav>
      <ul>
        <li><a href=#>Home</a>
        <li><a href=#>Speakers</a>
        <li><a class=selected href=#>Schedule</a>
        <li><a href=#>The Venue</a>
        <li><a href=#>Sponsors</a>
        <li><a href=#>Workshops</a>
      </ul>
      <div class=clear></div>
    </nav>
    
    
    
    
    
    
    <h1 class=headline><img src=images/headlines/full-frontal-javascript-conference.png alt="Full Frontal Javascript Conference"></h1>
    
    <div class=speakers-list>    
      <ul>
        <li><a href=#>Paul Rouget</a>
        <li><a href=#>Brian Leroux</a>
        <li><a href=#>Dan Webb</a>
        <li><a href=#>Alex Russell</a>
        <li><a href=#>Jan Lehnardt</a>
        <li><a href=#>Seb Lee-Delisle</a>
        <li><a href=#>Paul Bakhaus</a>
      </ul>
    
      <h2>Duke Of Yorks, Brighton, <br> 11th November 2011</h2>
    </div>
    
    <div class=image-cube>
      <div><img src=images/home/home-1.jpg></div>
      <div><img src=images/home/home-2.jpg></div>
      <div><img src=images/home/home-3.jpg></div>
      <div><img src=images/home/home-4.jpg></div>
      <div><img src=images/home/home-5.jpg></div>
      <div><img src=images/home/home-6.jpg></div>
      <div><img src=images/home/home-7.jpg></div>
      <div><img src=images/home/home-8.jpg></div>
      <div><img src=images/home/home-9.jpg></div>
    </div>
    
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
            <footer><a href="http://twitter.com/<?=$fav->user->screen_name?>"><img width=30 height=30 src="<?=$fav->user->profile_image_url?>" alt="<?=$fav->user->screen_name?>"></a><a href="http://twitter.com/<?=$fav->user->screen_name?>/statuses/<?=$fav->id_str?>"><?=$fav->user->screen_name?></a></footer>
          </blockquote></div>
    <?php endfor ?>

          <div class=clear></div>
        </div><!-- .tweets -->
    
    <h1 class=headline><img src=images/headlines/schedule.png alt=Schedule></h1>
    
    <ol class=schedule>
      <li>
        <span class=timeslot>
          <time>09:00</time> &ndash; <time>09:15</time>
        </span>
        <section>
          <h1>Registration</h1>
        </section>
      
      <li>
        <span class=timeslot>
          <time>09:30</time> &ndash; <time>10:30</time>
          <a href=#>Alex Russel</a>
        </span>
        <img src=/ width= height= alt=>
        <section>
          <h1>Less and more: How HTML5 will change the framework landscape</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </section>
    </ol>
    
    
    
    
    
    <h1 class=headline><img src=images/headlines/speakers.png alt=Speakers></h1>
    
    <section>
      <h1><span class=number></span>Brendan Dawes</h1>
      <img src=/ width= height= alt=>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua. Ut enim ad minim veniam, quis nostrud.
    </section>
    
    



    <h1 class=headline><img src=images/headlines/sponsors.png alt=Sponsors></h1>
    
    <section class=sponsor-blurb>
      <h1>
        <span class=line1>Full Frontal</span>
        <span class=line2>is proudly</span>
        <span class=line3>sponsored by</span>
      </h1>
      <p>
        Sponsoring Full Frontal means developers, designer, bloggers and more get to know your company better
        and shows that you support their community. You’ll have the opportunity to promote your brand and
        products to attendees and potentially meet new employees, clients and users.
      <p>
        There are also networking opportunities throughout the conference and during the after party.
        Find out how your company can sponsor Full Frontal by reviewing our <a href=#>sponsorship packages</a>
        and <a href=#>get in touch</a> with us to discuss how we can work together.
    </section>
    
    <section class=sponsor-full>
      <a href=#>
        <h1><img src=/ width= height= alt=Mozilla></h1>
      </a>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irur
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </section>
    
    <section class="sponsor sponsor-half">
      <h1>Half Monties
        <a href=#>Become a Half Monty sponsor</a>  
      </h1>
      <a href=#><img src=/ width= height= alt=></a>
      <a href=#><img src=/ width= height= alt=></a>
      <a href=#><img src=/ width= height= alt=></a>
    </section>
    
    <section class="sponsor sponsor-small">
      <h1>Small Monties
        <a href=#>Become a Small Monty Sponsor</a>
      </h1>
        <a href=#><img src=/ width= height= alt=></a>
        <a href=#><img src=/ width= height= alt=></a>
        <a href=#><img src=/ width= height= alt=></a>
        <a href=#><img src=/ width= height= alt=></a>
        <a href=#><img src=/ width= height= alt=></a>
        <a class=available href=#><img src=/ width= height= alt=></a>
    </section>
    
    <section class="sponsor sponsor-media">
      <h1>Media Partners
        <a href=#>Become a Media Partner</a>
      </h1>
        <a href=#><img src=/ width= height= alt=></a>
        <a href=#><img src=/ width= height= alt=></a>
        <a href=#><img src=/ width= height= alt=></a>
        <a class=available href=#><img src=/ width= height= alt=></a>
        <a class=available href=#><img src=/ width= height= alt=></a>
        <a class=available href=#><img src=/ width= height= alt=></a>
    </section>
  
    
    
    
    
    <h1 class=headline><img src=images/headlines/workshops.png alt=Workshops></h1>
    
    <section class=workshop>
      <div class=details>
        <header>
          <h1><abbr>HTML5</abbr> Javascript <abbr>API</abbr>s</h1>
          <time>11th Novermber, 09:30 &ndash; 17:00</time><br>
          <a href=#>Remy Sharp</a> at <a href=#>Clarendon Centre</a>
        </header>
      
        <p>HTML5 has gained a lot of attention over the last 12 months. With browsers increasingly supporting the features of the vast JavaScript APIs both in and around the official HTML5 spec, it's making the job of creating awesome applications purely using these web technologies very easy indeed.

        <p>This full day workshop will introduce you to HTML5 with a brief backstory, before diving into the APIs one by one. As well as going through code and showing practical demonstrations, where possible, we'll also talk about the alternatives for old browsers that don't support "awesome" out of the box. 
        
        <ul>
          <li>Video &amp; audio – move over Flash
          <li>Canvas &mdash; bring on the Mario games
          <li>Storage &mdash; like cookies, but tastes so much better
          <li>Offline &mdash; forget the web
          <li>Geolocation &mdash; finders keepers
          <li>Web Workers &mdash; multithreading for the browser
          <li>Web Sockets &mdash; pushing data was never so easy
        </ul> 
        
        <h2>Who's it for?</h2>
        
        <p>You're not expected to have played with HTML5 just yet, but you will need to have a reasonable understanding of HTML & JavaScript. A lot of the individual APIs are being used in popular web sites today both in desktop browsers and mobile, so rest assured that this applies to developers that are working on the web today.
        
        <h2>Prerequisites</h2>
        
        <p>Delegates will need their own laptop and copies of the latest browsers - at the very least Safari 5 (Download) or Chrome 5 (Download).

      </div>
      
      <div class=callout>
        <img src=images/pictures/workshop-speaker-1>
        <a href=# class="buy-tickets early-bird">
          Earlybird<br>
          <span>1 day &pound;99+ <abbr>VAT</abbr></span><br>
          <span class=buy-button><img src=images/buy-tickets width=278 height=48 alt="Buy Tickets"></span>
        </a>
      </div>
    </section>
    
    
    
    
    
    <h1 class=headline><img src=images/headlines/the-tickets.png alt="The Tickets"></h1>
    
    <section class=tickets>
      <h1>Conference</h1>
      <h2>&pound;99+ <abbr>VAT</abbr> <span>No workshops</span></h2>
      <ul>
        <li>Full Day Conference Ticket
        <li>Complimenatary Coffer &amp; Snacks
        <li>Access to the After Party
      </ul>
      <span class=sold-button><img src=images/sold-out.png width=278 height=48 alt="Sold Out"></span>
    </section> 
    
    <section class=tickets>
      <h1>Workshop 1</h1>
      <h2>&pound;109+ <abbr>VAT</abbr> <span>Inc. Confernece</span></h2>
      <ul>
        <li><abbr>HTML5</abbr> Javascript <abbr>API</abbr> Workshop
        <li>Full Day Conference Ticket
        <li>Complimentary Coffee &amp; Snacks
        <li>Access to the After Party
        <li>Free <em>Swag</em> Bag
      </ul>
      <span class=sold-button><img src=images/sold-out.png width=278 height=48 alt="Sold Out"></span>
    </section>
    
    <section class=tickets>
      <h1>Workshop 2</h1>
      <h2>&pound;109+ <abbr>VAT</abbr> <span>No workshops</span></h2>
      <ul>
        <li>Full Day Conference Tickets
        <li>Complimenatary Coffer &amp; Snacks
        <li>Access to the After Party
      </ul>
      <a href=# class=buy-button><img src=images/buy-tickets.png width=278 height=48 alt="Buy Tickets"></a>
    </section>
    
    <p class="highlight clear">
      Please note that due to the was Stage<abbr>HQ</abbr> (our payment system) works, the <abbr>VAT</abbr>
      won't show up separately when buying the tickets (nor in PayPal). <abbr>VAT</abbr> has been separately
      added, and our <abbr>VAT</abbr> registration is: 993 1266 95
      
    <p>
      If your tickets type isn't available, <a href=mailto:#>please email us</a> with your name and the ticket
      you wanted, and we'll add you to the waiting list and email you if the ticket becomes available. This
      will be on a first come first serve basis.
      
    
    
    
    
    <h1 class=headline><img src=images/headlines/the-venue.png alt="The Venue"></h1>
    
    <section class=venue>
      <div class=details>
        <h2>
          <span>Duke</span>
          <span>of York's Picturehouse</span>
          <span>Preston Circus, Brighton, BN1 4NA</span>
          <span>+44 (0)871 902 5728</span>
        </h2>
    
        <p>
          Full Frontal Javascript Conference is being held at the historic 
          <a href=#>Duke of York's Picturehouse</a> in Brighton. It is centrally located on
          Preston Circus, less than 15 minutes walk from Brighton train station.
          Trains run regularly from Gatwick Airport, London Bridge and London Victoria
          station.
      </div>
      
      <img src=images/pictures/venue.jpg>
    </section>
    
    <section class=associated-venues>
      <div class=details>
        <h2>Hotels</h2>
    
        <ul>
          <li><a href#>Jury's Inn'</a> £88*<br>
              101 Stroundly Road, Brighton, BN1 4DJ
          <li><a href#>Travelodge</a> £35.50*<br>
              165-167 Preston Road, Brighton, BN1 6AU
          <li><a href#>My Hotel</a> £104*<br>
              17 Jubilee Street, Brighton, BN1 1GE
          <li><a href#>Queens Hotel</a> £89*<br>
              1-5 Kings Road, Brighton, BN1 1NS
        </ul>
    
        <h2>Food</h2>
    
        <ul>
          <li><a href#>Circus Circus</a> Pub<br>
                101 Stroundly Road, Brighton, BN1 4DJ
          <li><a href#>The Open House</a> Pub<br>
              165-167 Preston Road, Brighton, BN1 6AU
          <li><a href#>Bardsley's'</a> Fish &amp; Chips<br>
              17 Jubilee Street, Brighton, BN1 1GE
          <li><a href#>Mitre Travern</a> Pub<br>
              Kings Road, Brighton, BN1 2GS
          <li><a href#>Mediterrane</a> Snacks<br>
              Next to Duke of York;s
        </ul>
    
        <h2>After Party</h2>
      
        <p>
          Please join us at the Full Frontal After Party at <a href#>Oh So Social</a> from
          6:30pm - 1am where <a href=#>Mozilla, our Full Monty sponsor, had bought you a pint!
      </div>
          
      <div id=venue-map></div>
    </section>
    
  </div><!-- .wrapper -->
<?php include('footer.php'); ?>