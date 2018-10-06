<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/fir-test-db-c68077650788.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://fir-test-db.firebaseio.com/')
    ->create();

$db = $firebase->getDatabase();

//1 Insert
// $db->getReference('students')
//    ->set([
//        'name' => 'satya',
//        'email' => 'satya@test.com',
//        'address' => 'Hyderabad'
// 

//2 Read
$reference = $db->getReference('students');
$value = $reference->getSnapshot()->getValue();
var_dump($value);
//array(3) { ["address"]=> string(9) "Hyderabad" ["email"]=> string(14) "satya@test.com" ["name"]=> string(5) "satya" }

