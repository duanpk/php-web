<?php

$msg = $_GET['msg'] ?? '';

echo $msg ? "<h1>$msg</h1>" : "<h1>Welcome guest</h1>";
