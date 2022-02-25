<?php
namespace Src;

use Src\Http\Route;
use Src\Database\DB;
use Src\Http\Request;
use Src\Database\Connection\ConnectsTo;
use Src\Support\Session;

class Application {
    private Request $request;
    private Route $route;
    public DB $db;
    public Session $session;
    public function __construct() {
        $this->request = new Request;
        $this->route = new Route($this->request);
        $this->db = new DB(ConnectsTo::getManger());
        session_start();
        $this->session = new Session;
    }


    public function run()
    {
        $this->db->init();
        $this->route->resolve();
    }
}
