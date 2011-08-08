</div><!-- .wrapper -->

<footer>
  <div class=fat-footer>
    <div class=wrapper>
    <section class=updates>
      <h1>Tweets &amp; Updates</h1>
      <div id=updates><!-- js hook --></div>
      <a class=follow href=https://twitter.com/fullfrontalconf>
        <img src=/images/follow.png alt="Follow @FullFrontalConf">
      </a>
    </section>
  
    <section class=sponsors>
      <h1>Proudly Sponsored By...</h1>
      <?php
      $full = array('<a class=large href=http://www.blackberry.com/developers><img src=/images/sponsors/blackberry.gif alt="The BlackBerry Developer Zone is the central place for developers to get tools, resources and information to develop for the BlackBerry Application Platform" width=264></a>','<a class=large href=http://www.mozilla.org><img src=/images/sponsors/mozilla.gif alt="Mozilla - Building a better internet, and dedicated to keeping it free, open and accessible to all" width=264></a>');
      shuffle($full);
      echo join($full, ' ');
      ?>
      <br>
      <a class=half href=http://www.webappuk.com/><img src=/images/sponsors/webappsuk.gif alt="Web Applications UK"></a>
      <br>
      <a class=small href=http://dharmafly.com#ff><img src=/images/sponsors/dharmafly.gif alt="Dharmafly, apps for change"></a>
      <a class=small href=http://pusher.com><img src=/images/sponsors/pusher.gif alt="Pusher - Supercharge your app with realtime events"></a>
      <a class=small href=http://uxebu.com><img src=/images/sponsors/uxebu.gif alt="uxebu - The Ajax and JavaScript experts"></a>
      <!-- <a class="small you" href=/sponsorship.html><img src=/images/you.png alt="Want to sponsor?"></a> -->
      <?php /*<!-- <a href=#><img src=/ alt= width=132 height=99></a>
      <a href=#><img src=/ alt= width=132 height=99></a>
      <a href=#><img src=/ alt= width=132 height=99></a>
      <a href=#><img src=/ alt= width=132 height=99></a>
      <a href=#><img src=/ alt= width=132 height=99></a>
      <a href=#><img src=/ alt= width=132 height=99></a> */?>
    </section>
    </div>
  </div>

  <div class=terms>
    <h1><a href=http://leftlogic.com>Left Logic</a></h1>
    <p>
      Full Frontal is a one day JavaScript Conference in Brighton (<abbr>UK</abbr>) at the Duke of York's cinema,
      organised by <a href=http://leftlogic.com>Left Logic</a>. 
      Read the <a href=/terms>Terms &amp; Conditions</a> or view past years
      <a href=http://2010.full-frontal.org>2010</a>, <a href=http://2009.full-frontal.org>2009</a>.
  </div>
</footer>

<script src=js/twitterlib.js></script>
<script src=js/main.js></script>
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

  // stops the transitions from applying whilst the page is rendering
  document.documentElement.className += ' transition';  
</script>
