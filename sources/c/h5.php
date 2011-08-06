<?php
function h5_css_form() {
  echo view('h5/form', array('_decorator' => 'layout'));
}

function h5_css_generate() {

  $_params = array
    ( 'nb' => 48
    , 'width' => 20
    , 'gutter' => 10
    , 'input_padding' => 2
    , 'textarea_padding' => 12
  );

  $params = array_merge($_params, array_map("intval", $_GET));
  $params['page_width'] = $params['width'] * $params['nb'] - $params['gutter'];

  if (abs($params['page_width']) > 2000) die($params['page_width'] . 'px - your webpages are so big! : )');

  echo view('h5/h5', array('params' => $params));
}