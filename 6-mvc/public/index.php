<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../routes/web.php';

$env = Dotenv::createImmutable(base_path());
$env->safeLoad();

app()->run();