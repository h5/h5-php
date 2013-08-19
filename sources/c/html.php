<?php
/**
 * This controller echoes a simple html placed in 'html' view folder decorated with layout 'layout'
 */
$page = isset($_GET['page']) ? preg_replace('/[^a-z1-9\/\\\]/i','', $_GET['page']) : 'index';
$folder = isset($folder) ? $folder : 'html';
$decorator = isset($decorator) ? $decorator : 'layout';

try {
	echo view("$folder/$page", array('_decorator' => $decorator));
}
catch (Exception $e) {
	echo view('http/404', array('error' => $e->getMessage()));
}