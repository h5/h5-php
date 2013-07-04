<?php header("HTTP/1.0 500 Internal Server Error"); ?>

500 Internal Server Error.

<?php (isset($error) && ini_get('display_errors')) and print $error;