<?php
require_once 'sources/h5.php';

$routes = array(

  'GET ^/h5/form$'             => array('h5/css/form'),
  'GET ^/h5\.css'              => array('h5/css/generate'),

  'GET ^/(?<page>[\w-]+).html$' => array('html'),
  'GET ^/$'                     => array('html'),

  '.*' => array(null),
);


return action(action('h5/route', array('routes' => $routes)));