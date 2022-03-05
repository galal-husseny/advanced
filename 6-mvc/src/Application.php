<?php
namespace Src;

use Src\Auth\Auth;
use Src\Http\Route;
use Src\Database\DB;
use Src\Http\Request;
use Src\Support\Session;
use Src\Database\Connection\ConnectsTo;

class Application {
    private Request $request;
    private Route $route;
    public DB $db;
    public Session $session;
    public Auth $auth;
    public function __construct() {
        $this->request = new Request;
        $this->route = new Route($this->request);
        $this->db = new DB(ConnectsTo::getManger());
        session_start();
        $this->session = new Session;
        $this->auth = new Auth;
    }


    public function run()
    {
        $this->db->init();
        $this->auth->init();
        date_default_timezone_set(env('TIMEZONE'));
        $this->route->resolve();
        
    }
}
