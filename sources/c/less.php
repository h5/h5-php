<?php
require_once(DIR_Z.'/lessc.php');

$file = preg_replace('/[^\w]/', '-', $_GET['file']); //secure?

$in = DIR_WEB . '/assets/' . $file. '.less';
$out = DIR_WEB . '/assets/' . $file. '.css';

header("Content-type: text/css");

try {

  if (!is_file($in))
    exit ("/*File `$file.less` does not exists*/");

  lessc::ccompile($in, $out);
  echo file_get_contents($out);

} catch (exception $ex) {
  exit("/*lessc fatal error:\n{$ex->getMessage()}*/");
}
