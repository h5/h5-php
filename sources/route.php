<?php
//routing
if (PHP_SAPI == 'cli') { // cli routing
  define('METHOD', 'GET');

  foreach (array_slice($argv, 1) as $v)
    if ($v[0] != '-')
      $_GET[] = $v;
    else if ($v[1] != '-') //if ($v[2] == '=') $out[$arg[1]] = substr($arg, 3); else
      $_GET = array_merge($_GET, array_fill_keys(str_split(substr($v, 1)), true));
    else {
      $arr = explode('=', trim($v, '- '));
      $_GET[$arr[0]] = isset($arr[1]) ? implode('=', array_slice($arr, 1)) : true;
    }
  unset($v, $arr);

  action(@$_GET[0]);
}
else {  // web routing
  if (isset($_POST['method'])) $method = strtoupper($_POST['method']);
  else $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

  define('METHOD', $method);

  $actions = array('');
  if (!isset($routes)) $routes = array();

  foreach ($routes as $rule => $action) {
    list($method, $reg) = explode(' ', $rule, 2) + array('GET', '.*');
    $uri = explode('?', $_SERVER['REQUEST_URI']);

    if (
      ($method == '*' || false !== strpos(strtoupper($method), METHOD))
      &&
      preg_match('/'.str_replace('/','\/',$reg).'/', $uri[0], $matches)
    ) {
      foreach ($matches as $k => $match) {
        if (is_string($k)) $_GET[$k] = $match;
      }

      $actions = (array)$action;

      break;
    }
  }

  foreach ($actions as $action) {
    $result = action($action);
    if (false === $result) break;
  }
}