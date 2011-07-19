<!DOCTYPE html> 
<html id="<?=$file?>">
<head>
  <meta charset=utf-8>
  <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
  <!-- TODO should this be max-width? -->
  <meta name=viewport content="width=max-width, initial-scale=1.0">
  <title>Full Frontal 2011- JavaScript Conference</title>
  <script>document.documentElement.className = 'js';</script>
  <link rel=stylesheet href='http://fonts.googleapis.com/css?family=Cabin+Sketch:bold' /> 
  <link rel=stylesheet href=fullfrontal.css>
  <link rel=stylesheet href=queries.css>
  
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
    
      <!-- <a href=/tickets class="buy-tickets early-bird">
        <span class=tickets-wrapper>
          <span class=type>Earlybird</span>
          <span class=price>1 day &pound;99+<abbr>VAT</abbr></span>
        </span>
        <span class=buy-button><img src=images/buy-tickets.png width=278 height=48 alt="Buy Tickets"></span>
      </a>-->
      
      
      <a href=/tickets class="buy-tickets buy-now">
        <span class=tickets-wrapper>
        <span class=type>Buy Now</span>
        <span class=price>1 day &pound;129+ <abbr>VAT</abbr></span>
        </span>
        <span class=buy-button><img src=images/buy-tickets.png width=278 height=48 alt="Buy Tickets"></span>
      </a>
            
      <!-- <span class="buy-tickets sold-out">Sold Out!</span> -->
      
           
    </header>
    <nav>
      <ul>
        <li><a <?=$file == 'home' ? 'class=selected ' : ''?>href=/>Home</a>
        <li><a <?=$file == 'speakers' ? 'class=selected ' : ''?>href=/speakers>Speakers</a>
<!--        <li><a <?=$file == 'schedule' ? 'class=selected ' : ''?>href=/schedule>Schedule</a> -->
        <li><a <?=$file == 'workshops' ? 'class=selected ' : ''?>href=/workshops>Workshops</a>
        <li><a <?=$file == 'venue' ? 'class=selected ' : ''?>href=/venue>The Venue</a>
        <li><a <?=$file == 'sponsors' ? 'class=selected ' : ''?>href=/sponsors>Sponsors</a>
      </ul>
      <div class=clear></div>
    </nav>
    <h1 class=headline><img src=<?=$title['image']?> alt="<?=$title['title']?>"></h1>
