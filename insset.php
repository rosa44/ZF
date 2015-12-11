<?php 
namespace Upjv;
require './vendor/autoload.php';
use Zend\ServiceManager\ServiceManager;

class insset {


$sm = new ServiceManager();

$sm­>setFactory('db', function() {

try {

echo "Factory\n";

if (!file_exists(__DIR__ . '/client.sqlite')) {

$db = new \PDO('sqlite:client.sqlite');

$db­>exec('CREATE TABLE "Client" ("Id" INTEGER PRIMARY KEY NOT NULL , "Nom" VARCHAR NOT NULL )');

} else {

$db = new \PDO('sqlite:client.sqlite');

}

} catch (Exception $e) {

echo $e­>getMessage();

}

return $db;

$db = $sm­>get('db');

if ( $argc > 1 )

$nom = $argv[1];

echo "ajout $nom\n";

$db­>exec('INSERT INTO "Client" ("Nom") VALUES (\''.$nom.'\')');

$autre = $sm­>get('db');

$stat = $autre­>query('SELECT * FROM Client');

while ( $result = $stat­>fetch() ) {

echo 'Nom : '.$result['Nom']."\n";
}
}
