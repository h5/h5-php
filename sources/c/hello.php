<?php
// получение данных
$world = isset($_GET['world']) ? $_GET['world'] : 'world';
// отображение шаблона
echo view('hello/index', array('world' => $world));