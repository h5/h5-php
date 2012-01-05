<?php
if ($action) return;

action('h5/test:::method');
action('h5/test::static_method');
action('h5/test:test_function');

class test {
  public function __construct() { $this->var = 'val'; }
  static public function static_method()  { echo __METHOD__ . PHP_EOL; }
         public function method()         { echo __METHOD__ . PHP_EOL; }
}

function test_function () { echo __METHOD__ . PHP_EOL; }

echo __FILE__ . PHP_EOL;
