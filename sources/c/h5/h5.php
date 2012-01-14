<?php
class h5 {

  static function css_form() {
    echo view('h5/form', array('_decorator' => 'layout'));
  }

  static function css_generate($params = false) {

    //    action('h5/h5::css_generate', array(array
    //          ( 'nb' => 24
    //          , 'width' => 20
    //          , 'gutter' => 10
    //          , 'input_padding' => 2
    //          , 'textarea_padding' => 12
    //        )));

    if ($params === false) $params = $_GET;

    $defaults = array
      ( 'nb' => 48
      , 'width' => 20
      , 'gutter' => 10
      , 'input_padding' => 2
      , 'textarea_padding' => 12
    );

    $params = array_merge($defaults, array_map("intval", $params));

    $params['page_width'] = $params['width'] * $params['nb'] - $params['gutter'];

    if (abs($params['page_width']) > 2000) die($params['page_width'] . 'px - your webpages are so big! : )');

    echo view('h5/h5', array('params' => $params));
  }
}





