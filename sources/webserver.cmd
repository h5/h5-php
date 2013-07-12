@echo off
start php -S localhost:8887 -t .. webserver.php
start /max http://localhost:8887