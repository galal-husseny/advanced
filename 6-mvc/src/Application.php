<?php
namespace Src;

use Src\Http\Route;
use Src\Database\DB;
use Src\Http\Request;
use Src\Database\Connection\ConnectsTo;

class Application {
    private Request $request;
    private Route $route;
    public DB $db;
    public function __construct() {
        $this->request = new Request;
        $this->route = new Route($this->request);
        $this->db = new DB(ConnectsTo::getManger());
    }

    public function run()
    {
        $this->route->resolve();
        // database connection
        $this->db->init();
    }
}
