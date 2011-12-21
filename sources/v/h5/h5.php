<?php
/** @var $params array */
header("Content-type: text/css");

echo view('h5/h5/reset',     $params);
echo view('h5/h5/typography',$params);
echo view('h5/h5/forms',     $params);
echo view('h5/h5/grid',      $params);
echo view('h5/h5/other',     $params);

if (!isset($_GET['noie'])) echo view('h5/h5/ie', array('params' => $params));