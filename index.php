<?php
$routes = array(

  'GET ^/(?<file>[\w-/]+).lss$' => 'less',

  'GET ^/(?<page>[\w-]+).html$' => 'html',
  'GET ^/$'                     => 'html',

  //'GET .*'                      => 'h5/test',
);

require_once 'sources/h5.php';

require_once 'sources/route.php';
