<?php
$routes = array(

  'GET ^/(?<file>[\w-/]+).lss$' => 'less',

  'GET ^/(?<page>[\w-]+).html$' => 'html',
  'GET ^/$'                     => 'html',

  //'GET .*'                      => 'h5/test',
);

require_once 'h5.php';

action('h5/route/web', ['routes' => $routes]);
