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
    
      <a href=# class=tickets>
        Earlybird<br>
        <span>1 day &pound;129+ <abbr>VAT</abbr></spn><br>
        <span class=button><img src=images/buy-tickets width=278 height=24 alt="Buy Tickets"></span>
      </a>
    </header>
    
    <nav>
      <ul>
        <li><a href=#>Home</a>
        <li><a href=#>Speakers</a>
        <li><a href=#>Schedule</a>
        <li><a href=#>The Venue</a>
        <li><a href=#>Sponsors</a>
        <li><a href=#>Workshops</a>
      </ul>
      <div class=clear></div>
    </nav>
    
    
    
    
    
    
    <hgroup>
      <h1>Full Frontal</h1>
      <h2>Javascript Conference</h2>
    </hgroup>
    
    <div class=list-speakers>    
      <ul>
        <li><a href=#>Paul Rouget</a>
        <li><a href=#>Brian Leroux</a>
        <li><a href=#>Dan Webb</a>
        <li><a href=#>Alex Russell</a>
        <li><a href=#>Jan Lehnardt</a>
        <li><a href=#>Seb Lee-Delisle</a>
        <li><a href=#>Paul Bakhaus</a>
      </ul>
    
      <h3>Duke Of Yorks, Brighton, <br> 11th November 2011</h3>
    
      <div class=image-cube>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
        <img src=/ width= height= alt=>
      </div>
    </div>

    <div class=want-to>
      <section class=speak>
        <h1>Want to <br> speak?</h1>
        <p>
          Want to speak at Full Frontal 2011? We'd love to give you the platform to speak to hundreds of
          developers and designers, so what are you waiting for, <a href="mailto:events@leftlogic.com?subject=FF2011%20Speaking%20Proposal">get in touch!</a>
      </section>
    
      <section class=sponsor>
        <h1>Want to <br> sponsor?</h1>
        <p>
          Find out how your company can sponsor Full Frontal by reviewing our
          <a href=/sponsorship.html>sponsorship packages</a> and <a href="mailto:events@leftlogic.com?subject=FF2011%20Sponsorship">get in touch</a> with us to discuss
          how we can work together.
      </section>
    </div>
    
<!-- Tweets -->
    
    
    
    
    
    <h1>Schedule</h1>
    
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
    
    
    
    
    
    <h1>Speakers</h1>
    
    <section>
      <h1><span class=number></span>Brendan Dawes</h1>
      <img src=/ width= height= alt=>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua. Ut enim ad minim veniam, quis nostrud.
    </section>
    
    



    <h1>Sponsors</h1>
    
    <h2>
      Full Frontal
      is proudly
      sponsored by
    </h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    
    <section class="sponsor full">
      <a href=#>
        <h1><img src=/ width= height= alt=Mozilla></h1>
      </a>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irur
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </section>
    
    <section class="sponsor half">
      <h1>Half Monties
        <a href=#>Become a Half Monty sponsor</a>  
      </h1>
      <a href=#><img src=/ width= height= alt=></a>
      <a href=#><img src=/ width= height= alt=></a>
      <a href=#><img src=/ width= height= alt=></a>
    </section>
    
    <section class="sponsor small">
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
    
    <section class="sponsor media">
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
  
    
    
    
    
    <h1>Workshops</h1>
    
    <div class=workshop>
      <section>
        <header>
          <h1><abbr>HTML5</abbr> Javascript <abbr>API</abbr>s</h1>
          <time>11th Novermber, 09:30 &ndash; 17:00</time>
          <a href=#>Remy Sharp</a> at <a href=#>Clarendon Centre</a>
        </header>
      
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
        
        <ul>
          <li>Video &amps; audio &mdash; move over Flash
          <li>Canvas &mdash; bring on the Mario games 
          <li>Video &amps; audio &mdash; move over Flash
          <li>Canvas &mdash; bring on the Mario games
          <li>Video &amps; audio &mdash; move over Flash
          <li>Canvas &mdash; bring on the Mario games
          <li>Video &amps; audio &mdash; move over Flash
        </ul> 

      </section>
      
      <div>
        <img>
        <a href=# class=tickets>
          Earlybird <br>
          1 day &pound;129+ <abbr>VAT</abbr> <br>
          <span>Buy tickets</span>
        </a>
      </div>
    </div>
    
    
    
    
    
    <h1>The Tickets<h1>
    
    <section>
      <h1>Conference<h1>
      <h2>&pound;109+ <abbr>VAT</abbr> <span>No workshops</span><h2>
      <ul>
        <li>Full Day Conference Tickets
        <li>Complimenatary Coffer &amps; Snacks
        <li>Access to the After Party
      </ul>
      <span>Sold Out!</span>
    </section> 
    
    <section>
      <h1>Conference<h1>
      <h2>&pound;109+ <abbr>VAT</abbr> <span>No workshops</span><h2>
      <ul>
        <li>Full Day Conference Tickets
        <li>Complimentary Coffee &amps; Snacks
        <li>Access to the After Party
      </ul>
      <span>Sold Out!</span
    </section>
    
    <section>
      <h1>Conference<h1>
      <h2>&pound;109+ <abbr>VAT</abbr> <span>No workshops</span><h2>
      <ul>
        <li>Full Day Conference Tickets
        <li>Complimenatary Coffer &amps; Snacks
        <li>Access to the After Party
      </ul>
      <a href=#>Buy Tickets</a>
    </section>
    
    <p>
      Please note that due to the was Stage<abbr>HQ</abbr> (our payment system) works, the <abbr>VAT</abbr>
      won't show up separately when buying the tickets (nor in PayPal). <abbr>VAT</abbr> has been separately
      added, and our <abbr>VAT</abbr> registration is: 993 1266 95
      
    <p>
      If your tickets type isn't available, <a href=mailto:#>please email us</a> with your name and the ticket
      you wanted, and we'll add you to the waiting list and email you if the ticket becomes available. This
      will be on a first come first serve basis.
      
      
      
      
      
    
  </div><!-- .wrapper -->
<?php include('footer.php'); ?>