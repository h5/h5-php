<?php

header('Content-type: application/json');

if (isset($json) && is_array($json)) echo json_encode($json);