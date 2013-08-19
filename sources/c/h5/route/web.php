<?php
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

foreach ($actions as $key => $value) {
	if (is_array($value)) {
		$params = $value;
		$action = $key;
	}
	else {
		$params = array();
		$action = $value;
	}
	$result = call_user_func_array('action', array($action, $params));
	if (false === $result) break;
}
