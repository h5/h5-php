<?php
/**
 * Blueprint style
 * action('h5/h5::css_generate', array(array
 *      ( 'nb' => 24
 *      , 'width' => 20
 *      , 'gutter' => 10
 *      , 'input_padding' => 2
 *      , 'textarea_padding' => 12
 *    )));
 */

if ($_vars === false) $_vars = $_GET;

$defaults = array
  ( 'nb' => 48
  , 'width' => 20
  , 'gutter' => 10
  , 'input_padding' => 2
  , 'textarea_padding' => 12
);

$_vars = array_merge($defaults, array_map("intval", $_vars));

$_vars['page_width'] = $_vars['width'] * $_vars['nb'] - $_vars['gutter'];

if (abs($_vars['page_width']) > 2000) die($_vars['page_width'] . 'px - your webpages are so big! : )');

echo view('h5/h5', array('params' => $_vars));
