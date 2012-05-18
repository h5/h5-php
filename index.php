<?php
require_once 'sources/cfg.php';
require_once 'sources/h5.php';

$routes = array(

  '^/h5/form$'      => array('h5/css/form', 'get'),
  '^/h5\.css'       => array('h5/css/generate', 'get'),

   '^/hello/(?<world>[\w-]+)$'       => array('hello', 'get'),

  '^/(?<page>[\w-]+).html$' => array('html', 'get'),
  '^/$'                     => array('html', 'get'),

  '.*' => array(null),
);


return action(action('h5/route', array('routes' => $routes)));