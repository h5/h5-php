<?php
error_reporting(E_ALL | E_STRICT); ini_set("display_errors", 1);
//error_reporting(0); ini_set("display_errors", 0);

define ('URI_BASE', '');
define ('URI', PHP_SAPI == 'cli' ? '' : $_SERVER["REQUEST_URI"]);

define ('DIR_WEB'    , getcwd());
define ('DIR_SOURCES', __DIR__);
define ('DIR_M'      , DIR_SOURCES.'/m');
define ('DIR_V'      , DIR_SOURCES.'/v');
define ('DIR_C'      , DIR_SOURCES.'/c');
define ('DIR_Z'      , DIR_SOURCES.'/z');

define('DB_DSN', 'sqlite:'.DIR_SOURCES.'/.db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
