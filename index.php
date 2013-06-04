<?php
$routes = array(

  'GET ^/h5/form$'              => 'h5/css/form',
  'GET ^/h5\.css'               => 'h5/css/generate',

  'GET ^/(?<file>[\w-]+).less$' => 'less',

  'GET ^/(?<page>[\w-]+).html$' => 'html',
  'GET ^/$'                     => 'html',

  //'GET .*'                      => 'h5/test',
);

require_once 'sources/h5.php';

require_once 'sources/route.php';
