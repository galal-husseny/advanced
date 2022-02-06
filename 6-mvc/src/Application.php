<?php
namespace Src;

use Src\Http\Request;
use Src\Http\Route;

class Application {
    private Request $request;
    private Route $route;

    public function __construct() {
        $this->request = new Request;
        $this->route = new Route($this->request);
    }

    public function run()
    {
        $this->route->resolve();
        // database connection
    }
}
