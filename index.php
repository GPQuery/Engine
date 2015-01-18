<?php

// Require Composer Autoloader
require 'vendor/autoload.php';

// Setup Laravel\Illuminate
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

// Configure MySQL Connection
require 'config/database.php';

// Bootstrap Eloquent ORM
$capsule = new Capsule;
//$capsule->addConnection($settings);
$capsule->addConnection($settings);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->bootEloquent();

// Require Eloquent ORM Models
$models = array('circuit', 'constructor', 'driver', 'race', 'result', 'season', 'status');
foreach($models as $model) {
  require('models/' . $model . '.php');
}

// Instantiate Slim Application
$app = new \Slim\Slim();

// Configure Slim Routes
$routes = array('races');
foreach($routes as $route) {
  require('routes/' . $route . '.php');
}

// Run Slim Application
$app->run();