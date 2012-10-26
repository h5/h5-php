<?php
error_reporting(E_ALL | E_STRICT); ini_set("display_errors", 1);
//error_reporting(0); ini_set("display_errors", 0);

define ('URI_BASE', '');
define ('URI', PHP_SAPI == 'cli' ? '' : $_SERVER["REQUEST_URI"]);

define ('DIR_WEB'    , $_SERVER["DOCUMENT_ROOT"]);
define ('DIR_SOURCES', dirname(__FILE__));
define ('DIR_M'      , DIR_SOURCES.'/m');
define ('DIR_V'      , DIR_SOURCES.'/v');
define ('DIR_C'      , DIR_SOURCES.'/c');
define ('DIR_Z'      , DIR_SOURCES.'/z');

define('DB_DSN', 'sqlite:'.DIR_SOURCES.'/.db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

//view
function view($_file, $_vars=array(), $_dir = DIR_V) {
  static $_super = array();
  if (!is_array($_vars)) $_vars=array('var' => $_vars)
  extract($_vars, EXTR_SKIP);
  ob_start();
  if (file_exists($_file = $_dir.'/'.$_file.'.php')) include $_file;
  else throw new Exception("View `$_file` not found.");
  $ogc = ob_get_clean();
  if ((isset($_decorator) && $_decorator !== false)) $ogc = view($_decorator, array("_content"  => $ogc));
  return $ogc;
}

//controller path/to/file, path/to/class::method
function action($action=null, $_vars = array()) {
  if ($action instanceof Closure) return $action();
  list ($path, $action) = explode(':', $action, 2) + array('', '');
  if (file_exists($file = DIR_C.'/'.$path.'.php')) {
    if (!$action) { extract($_vars, EXTR_SKIP); return require $file; }
    require_once $file;
    try {
      $class = substr($path,strrpos($path, '/')+1);
      $method = new ReflectionMethod($class, $action);
      return $method->invokeArgs($method->isStatic() ? null : new $class, $_vars);
    }
    catch (Exception $e){}
  }
  echo view('http/404', array('error' => 'Controller not found')); return false;
}

//model
function pdo() {
  static $p = false;
  if ($p === false)
    try { $p = new PDO(DB_DSN, DB_USER, DB_PASSWORD); $p->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); }
    catch (PDOException $e) { view('http/500', array('error' => $e->getMessage())); }
  return $p;
}

//wtf?
function wtf() {
  if (PHP_SAPI != 'cli') echo '<pre>';
  if (func_num_args()) var_dump(func_get_args());
  else var_dump(array_slice(debug_backtrace(), 1, 5));
  echo $hr = str_repeat('-', 80), PHP_EOL;
  for ($t = debug_backtrace(), $c = current($t); $c && key($t) < 5; $c = next($t))
    echo key($t)+1, '. ', @implode(' ', $c), PHP_EOL;
  die($hr.PHP_EOL.date('r').PHP_EOL);
}

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