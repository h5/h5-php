<?php
/** @var $routes array */
if (!$_POST)
  $method = 'GET';
else
  $method = isset($_REQUEST['method']) ? strtoupper($_REQUEST['method']) : 'POST';

define('METHOD', $method);

foreach ($routes as $rule => $route) {
  $route = (array)$route + array(null, 'GET');
  if (
    ($route[1] == '*' || false !== strpos(strtoupper($route[1]), $method))
    &&
    preg_match('/'.str_replace('/','\/',$rule).'/', $_SERVER['REQUEST_URI'], $matches)
  ) {

    foreach ($matches as $k => $match) if (is_string($k)) $_GET[$k] = $match;
    return $route[0];
  }
}
return null;