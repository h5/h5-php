<?php
error_reporting(E_ALL | E_STRICT); ini_set("display_errors", 1);
//error_reporting(0); ini_set("display_errors", 0);

defined('URI_BASE') OR define ('URI_BASE', '');

define ('URI', PHP_SAPI == 'cli' ? '' : $_SERVER["REQUEST_URI"]);

defined('DIR_WEB') OR define ('DIR_WEB', $_SERVER["DOCUMENT_ROOT"]);
defined('DIR_SOURCES') OR define ('DIR_SOURCES', dirname(__FILE__));
defined('DIR_M') OR define ('DIR_M'      , DIR_SOURCES.'/m');
defined('DIR_V') OR define ('DIR_V'      , DIR_SOURCES.'/v');
defined('DIR_C') OR define ('DIR_C'      , DIR_SOURCES.'/c');
defined('DIR_Z') OR define ('DIR_Z'      , DIR_SOURCES.'/z');

defined('DB_DSN') OR define('DB_DSN', 'sqlite:'.DIR_SOURCES.'/.db');
defined('DB_USER') OR define('DB_USER', 'root');
defined('DB_PASSWORD') OR define('DB_PASSWORD', '');

//view
function view($_file, $_vars=array(), $_dir = DIR_V) {
  static $_super = array();
  if (!is_array($_vars)) $_vars = array('var' => $_vars);
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