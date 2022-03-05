<?php

use Dotenv\Dotenv;
use App\Models\User;
use Src\Auth\Auth;
use Src\Http\Response;
use Src\Support\Session;


require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../routes/web.php';

$env = Dotenv::createImmutable(base_path());
$env->safeLoad();

app()->run(); 

