<?php
// path/to/php5.4 -S localhost:8000 -t . router.php

if (
  preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/',$_SERVER["REQUEST_URI"])
  AND
  file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'])
)
{
  return false; // serve the requested resource as-is.
}

include_once 'index.php';
