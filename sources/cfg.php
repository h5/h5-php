<?php
error_reporting(E_ALL | E_STRICT); ini_set("display_errors", 1);

define ('URI_BASE', '');
define ('URI', PHP_SAPI == 'cli' ? '' : $_SERVER["REQUEST_URI"]);

define ('DIR_WEB', dirname(__FILE__)); // use __DIR__ for php 5.3