<?php
// to use php 5.4 build-in web server:
// path/to/php5.4 -S localhost:8000 -t . webserver.php

if (
  preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/',$_SERVER["REQUEST_URI"])
  AND
  file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'])
)
{
  return false; // serve the requested resource as-is.
}

include_once 'index.php';
