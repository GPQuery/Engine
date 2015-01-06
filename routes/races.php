<?php

// Race Details by raceId
$app->get('/race/:raceId', function($raceId)  {
  $query = Race::find($raceId)->load('circuit', 'season');
  $query->results->load('driver', 'constructor', 'status');
  echo $query->toJson();
});

// Race Details, Random
$app->get('/race', function() {
  $query = Race::find(rand(1,256))->load('circuit', 'season');
  $query->results->load('driver', 'constructor', 'status');
  echo $query->toJson();  
});

// Races, All
$app->get('/races/', function() {
  $query = Race::with('circuit')->orderBy('year', 'DESC')->get();
  echo $query->toJson();
});

// Races by Year
$app->get('/races/:year', function($year) {
  $query = Race::with('circuit')->where('year', $year)->get();
  echo $query->toJson();
});