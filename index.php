<?php
require_once 'sources/h5.php';

$routes = array(

  'GET ^/h5/form$'              => 'h5/css/form',
  'GET ^/h5\.css'               => 'h5/css/generate',

  'GET ^/(?<page>[\w-]+).html$' => 'html',
  'GET ^/$'                     => 'html',

  //'GET .*'                      => 'h5/test',
);


return action('h5/route', array('routes' => $routes));