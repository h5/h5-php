<?php

header('WWW-Authenticate: Basic realm="Dashboard"');
header('HTTP/1.0 401 Unauthorized');
?>

401 Unauthorized.

<?php (isset($error) && ini_get('display_errors')) and print $error;