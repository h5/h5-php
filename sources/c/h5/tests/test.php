<?php
if ($action) return; //prevent a twice execution of this file as controller

action('h5/tests/test:object_method');
action('h5/tests/test:static_method');


class test {
  public function __construct() { $this->var = 'val'; }
  static public function static_method()  { echo __METHOD__ . PHP_EOL; }
         public function object_method()  { echo __METHOD__ . PHP_EOL; }
}

echo __FILE__;
