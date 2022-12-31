<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
  ->withServiceAccount('./firebase/saline-test-firebase-adminsdk-5yzpg-86c403a893.json')
  ->withDatabaseUri('https://saline-test-default-rtdb.firebaseio.com');

  $database = $factory->createDatabase();

?>