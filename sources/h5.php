<?php
!defined('DIR_SOURCES') and define ('DIR_SOURCES', dirname(__FILE__));
foreach(array('M', 'V', 'C', 'Z') as $v) !defined('DIR_'.$v) and define ('DIR_'.$v, DIR_SOURCES.'/'.strtolower($v).'/'); unset($v);

//view
function view($_file, $_view_vars=array()) {
  extract($_view_vars, EXTR_SKIP);
  ob_start();
  if (file_exists(DIR_V.$_file.'.php')) include DIR_V.$_file.'.php';
  else throw new Exception("View `$_file` not found.");
  $__ogc = ob_get_clean();
  if ((isset($_decorator) && $_decorator !== false)) $__ogc = view($_decorator, array("_content"  => $__ogc));
  return $__ogc;
}


//controller path/to/file:function, path/to/class::static, path/to/class:::method
function action($action=null) {
  list ($path, $action) = explode(':', $action, 2) + array('', '');
  if (file_exists($file = DIR_C.$path.'.php')) {
    if (!$action) return require $file;
    require_once $file;
    if (trim($action, ':') && $action[0] == ':') {
      $path = explode('/', $path);
      if (class_exists($class = end($path))) {
        if($action[1] == ':') $class = new $class;
        $action = array($class,  trim($action, ':'));
      }
    }
    if (is_callable($action)) return call_user_func($action);
  }
  echo view('http/404', array('error' => 'Controller not found')); return false;
}

//model
function pdo() {
  static $p = false;
  !defined('DB_DSN') and define('DB_DSN', 'sqlite:'.DIR_SOURCES.'/.db'); !defined('DB_USER') and define('DB_USER', 'root'); !defined('DB_PASSWORD') and define('DB_PASSWORD', '');
  if ($p === false)
    try { $p = new PDO(DB_DSN, DB_USER, DB_PASSWORD); $p->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); }
    catch (PDOException $e) { view('http/500', array('error' => $e->getMessage())); }
  return $p;
}

//debug?
function qwe() {
  echo '<pre>', PHP_EOL,
  print_r(array_slice(debug_backtrace(), 0, 5), true),
  str_repeat('-', 80), PHP_EOL, date('r'),
  PHP_EOL, '</pre>', die();
}