<?php

use Dotenv\Dotenv;
use Src\Http\Request;
use Src\Http\Route;


require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../routes/web.php';

$env = Dotenv::createImmutable(base_path());
$env->safeLoad();


$route = new Route(new Request);
$route->resolve();

