<?php
/** @var $routes array */

if (isset($_POST['method'])) $method = strtoupper($POST['method']);
else $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

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