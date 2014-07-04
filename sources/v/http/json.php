<?php

header('Content-type: application/json');

if (isset($_vars)) echo json_encode($_vars, DEBUG ? JSON_PRETTY_PRINT : 0);