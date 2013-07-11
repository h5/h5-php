<?php
require_once(DIR_Z . '/lessc.php');

$file = preg_replace('/[^\w\/]/', '-', $_GET['file']); //secure?

$in = DIR_WEB . '/' . $file . '.less';
$out = DIR_WEB . '/' . $file . '.css';

header("Content-type: text/css");

try {
	if (!is_file($in)) {
		exit("/*File `$file.less` does not exists*/");
	}

	$less = new lessc;
	if (DEBUG) {
		$less->compileFile($in, $out);
	} else {
		$less->checkedCompile($in, $out);
	}

	echo file_get_contents($out);

} catch (Exception $ex) {
	exit("/*lessc fatal error:\n{$ex->getMessage()}*/");
}