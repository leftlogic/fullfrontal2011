<?php
$file = isset($_GET['request']) && $_GET['request'] ? $_GET['request'] : 'home';
$file = preg_replace('/\.html/', '', $file);
$file = preg_replace('/[^a-z]/', '', $file);

$titles = array(
  'home' => array('title' => 'Full Frontal Javascript Conference', 'image' => '/images/headlines/full-frontal-javascript-conference.png'),
  'speakers' => array('title' => 'Speakers', 'image' => '/images/headlines/speakers.png'),
  'terms' => array('title' => 'Terms and Conditions', 'image' => '/images/headlines/terms.png'),
  'venue' => array('title' => 'Venue Details', 'image' => '/images/headlines/the-venue.png'),
  'schedule' => array('title' => 'Schedule', 'image' => '/images/headlines/schedule.png'),
  'workshops' => array('title' => 'Workshops', 'image' => '/images/headlines/workshops.png'),
  'tickets' => array('title' => 'Tickets', 'image' => '/images/headlines/the-tickets.png'),
  'sponsors' => array('title' => 'Sponsorship', 'image' => '/images/headlines/sponsors.png')
);


// FIXME - do we really need firefox 2 support?
if (preg_match('/rv:1\.(([1-8]|9pre|9a|9b[0-4])\.[0-9.]+).*Gecko/', @$_SERVER['HTTP_USER_AGENT'])) {
  header('Content-type: application/xhtml+xml');
}

// short links - used for later in the project
if ($file == 'ohso') {
  header("Location: http://goo.gl/XF0K");
} else if ($file == 'fflunch') {
  header("Location: http://goo.gl/MmGn");
} else {
  if (!file_exists('includes/' . $file . '.php')) {
    $file = 'home';
    header("HTTP/1.0 404 Not Found");
    $crazyload = true;
  }
  
  $title = isset($titles[$file]) ? $titles[$file] : $titles['home'];
  
  include('includes/header.php');
  include('includes/' . $file . '.php');
  include('includes/footer.php');
}


?>
