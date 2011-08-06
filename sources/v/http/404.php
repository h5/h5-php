<?php header("HTTP/1.0 404 Not Found"); ?>

404 Not Found.

<?php (isset($error) && ini_get('display_errors')) and print $error;