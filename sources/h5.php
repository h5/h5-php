<?php
!defined('DIR_SOURCES') and define ('DIR_SOURCES', dirname(__FILE__));
foreach(array('M', 'V', 'C', 'Z') as $v) !defined('DIR_'.$v) and define ('DIR_'.$v, DIR_SOURCES.'/'.strtolower($v).'/'); unset($v);

//view
function view($_file, $_vars=array()) {
  static $_super = array();
  extract($_vars, EXTR_SKIP);
  ob_start();
  if (file_exists($_file = DIR_V.$_file.'.php')) include $_file;
  else throw new Exception("View `$_file` not found.");
  $ogc = ob_get_clean();
  if ((isset($_decorator) && $_decorator !== false)) $ogc = view($_decorator, array("_content"  => $ogc));
  return $ogc;
}

//controller path/to/file, path/to/file:function, path/to/class::static, path/to/class:::non-static
function action($action=null, $_vars = array()) {
  if ($action instanceof Closure) return $action();
  list ($path, $action) = explode(':', $action, 2) + array('', '');
  if (file_exists($file = DIR_C.$path.'.php')) {
    if (!$action) { extract($_vars, EXTR_SKIP); return require $file; }
    require_once $file;
    if (trim($action, ':') && $action[0] == ':') {
      $path = explode('/', $path);
      if (class_exists($class = end($path))) {
        if($action[1] == ':') $class = new $class;
        $action = array($class,  trim($action, ':'));
      }
    }
    if (is_callable($action)) return call_user_func_array($action, $_vars);
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
    echo key($t)+1, '. ', array_walk($c, function(&$a) { !is_object($a) and print $a.' ';}) and null, PHP_EOL;
  die($hr.PHP_EOL.date('r').PHP_EOL);
}
