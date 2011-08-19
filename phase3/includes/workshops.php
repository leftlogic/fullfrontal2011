<?php
$workshops = array('ppk', 'remy');
// shuffle($workshops);
include('workshop-' . $workshops[0] . '.php');
include('workshop-' . $workshops[1] . '.php');
?>
