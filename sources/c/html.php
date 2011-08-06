<?php
/**
 * This controller echoes a simple html placed in 'html' view folder decoreted with layout 'layout'
 */
$page = isset($_GET['page']) ? preg_replace('/[^a-z1-9\/\\\]/i','', $_GET['page']) : 'index';
try {
  echo view('html/' . $page, array('_decorator' => 'layout'));
}
catch (Exception $e) {
  echo view('http/404');
}