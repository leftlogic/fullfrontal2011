<?php
$file = isset($_GET['request']) && $_GET['request'] ? $_GET['request'] : 'home';
$file = preg_replace('/\.html/', '', $file);
$file = preg_replace('/[^a-z]/', '', $file);

$titles = array(
    'speakers' => 'Speakers',
    'terms' => 'Terms and Conditions',
    'venue' => 'Venue Details',
    'schedule' => 'Schedule',
    'workshops' => 'Workshops',
    'sponsors' => 'Sponsorship'
);

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
  
  $title = isset($titles[$file]) ? $titles[$file] . ' - ' : '';
  
  include('includes/header.php');
  include('includes/' . $file . '.php');
  include('includes/footer.php');
}


?>
