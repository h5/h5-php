<?php
//php54/php -S localhost:8000 -t . router.php
require_once 'sources/h5.php';

if (false === route(array(
  '\.(?:png|jpg|jpeg|gif|css|ico)$' => false,
))) return false;

require 'index.php';