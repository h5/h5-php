<?php
require_once(DIR_Z.'/lessc.php');

$file = preg_replace('/[^\w]/', '-', $_GET['file']); //secure?

$in = DIR_WEB . '/assets/' . $file. '.less';
$out = DIR_WEB . '/assets/' . $file. '.less.css';

header("Content-type: text/css");

try {

  if (!is_file($in))
    exit ("/*File `$file.less` does not exists*/");

  lessc::ccompile($in, $out);
  echo file_get_contents($out);

} catch (exception $ex) {
  exit("/*lessc fatal error:\n{$ex->getMessage()}*/");
}




/*/////////////////////////


$cache_fname = $less_fname.".cache";
if (file_exists($cache_fname)) {
  $cache = unserialize(file_get_contents($cache_fname));
} else {
  $cache = $less_fname;
}

$new_cache = lessc::cexecute($cache);
if (!is_array($cache) || $new_cache['updated'] > $cache['updated']) {
  file_put_contents($cache_fname, serialize($new_cache));
  file_put_contents($css_fname, $new_cache['compiled']);
}



$less = new lessc();
try {
  $less->parse("} invalid LESS }}}");
} catch (Exception $ex) {
  echo "lessphp fatal error: ".$ex->getMessage();
}

//////////////////////////////////////
*/