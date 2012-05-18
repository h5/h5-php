<?php
/** @var $routes array */

if (isset($_POST['method'])) $method = strtoupper($POST['method']);
else $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

define('METHOD', $method);

foreach ($routes as $rule => $action) {
    $action = (array)$action + array(null);
    list($method, $reg) = explode(' ', $rule, 2) + array('GET', '.*');
    $uri = explode('?', $_SERVER['REQUEST_URI']);

    if (
        ($method == '*' || false !== strpos(strtoupper($method), METHOD))
        &&
        preg_match('/'.str_replace('/','\/',$reg).'/', $uri[0], $matches)
    ) {
        foreach ($matches as $k => $match) if (is_string($k)) $_GET[$k] = $match;
        return $action[0];
    }
}
return null;