<?php

// Require Composer Autoloader
require '../vendor/autoload.php';

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

// Load all PHP files in models/
$files = scandir('models');
foreach($files as $file)  {
  if(substr_compare($file, "php", -3, 3, true) == 0)  {
    require "models/" . $file;
  }
}

// Instantiate Slim Application
$app = new \Slim\Slim();

// Configure Slim Routes

  // List Races
  $app->get('/races/', function() {
    $query = Race::with('circuit')->orderBy('year', 'DESC')->get();
    echo $query->toJson();
  });
  $app->get('/races', function() {
    $query = Race::with('circuit')->orderBy('year', 'DESC')->get();
    echo $query->toJson();
  });

  
  // List Requests
  $app->get('/requests', function() {
    $query = Request::with('race', 'circuit')->orderBy('year', 'DESC')->get();
    echo $query->toJson();
  });


  // Add new Request
  $app->get('request/add/:raceId', function($raceId) {
    $request = new Request(array(
    ));
  })

    // 

// Run Slim Application
$app->run();