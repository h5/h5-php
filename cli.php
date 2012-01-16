#!/usr/bin/env php
<?php

foreach (array_slice($argv, 1) as $v)
  if ($v[0] != '-')
    $_GET[] = $v;
  else if ($v[1] != '-') //if ($v[2] == '=') $out[$arg[1]] = substr($arg, 3); else
      $_GET = array_merge($_GET, array_fill_keys(str_split(substr($v, 1)), true));
  else {
    $arr = explode('=', trim($v, '- '));
    $_GET[$arr[0]] = isset($arr[1]) ? implode('=', array_slice($arr, 1)) : true;
  }
unset($v, $arr);

require 'sources/cfg.php';

require 'sources/h5.php';

action(@$_GET[0]);
