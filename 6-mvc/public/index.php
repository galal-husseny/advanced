<?php

use Dotenv\Dotenv;
use App\Models\User;
use Src\Database\Grammers\MYSQLGrammer;
use Src\Database\Model;
use Src\Support\Str;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../routes/web.php';

$env = Dotenv::createImmutable(base_path());
$env->safeLoad();

app()->run();

// dd(MYSQLGrammer::buildInsertQuery(['name','id','password','email']));
// dd(MYSQLGrammer::buildUpdateQuery(['name','id','password','email'],['id','>=',5]));
// dd(MYSQLGrammer::buidSelectQuery(['name','id','password','email'],['id','>=',5]));
// dd(MYSQLGrammer::buildDeleteQuery(['email','=','ahmed@gmail.com']));
// User::create([
//     'name'=>'ahmed',
//     'email'=>'ahmed@gmail.com',
//     'password'=>bcrypt(123456)
// ]);

// User::update([
//     'name'=>'mohamed',
//     'email'=>'mohamed@gmail.com',
// ],
// ['id','=',1]
// );

// (User::delete(['id','=','2']));
// dd(User::all());