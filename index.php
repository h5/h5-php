<?php
error_reporting(E_ALL | E_STRICT); ini_set("display_errors", 1);

define ('URI_BASE', '');
define ('URI', $_SERVER["REQUEST_URI"]);

define ('DIR_WEB', dirname(__FILE__));

require 'sources/h5.php';

action(@$_SERVER['REDIRECT_ACTION']);

