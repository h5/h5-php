<?php
require_once 'sources/cfg.php';
require_once 'sources/h5.php';

$routes = array(

  '^/h5$'       => array('h5/h5::css_generate', 'get'),
  '^/h5/form$'  => array('h5/h5::css_form', 'get'),

  '^/(?<page>[\w-]+).html$' => array('html', 'get'),
  '^/$'                     => array('html', 'get'),

  '.*' => array(null),
);


return action(route($routes));