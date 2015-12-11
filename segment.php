<?php
require "./vendor/autoload.php";

$route = \Zend\Mvc\Router\Http\Segment::factory(
    array('route'=>'/:controller',
          'constraints' => array(
        'controller' => '[a-zA-Z]+',
       ),
          
        'defaults'=>array('param1'=>'val1',
            'param2'=>'val2'))
);

$req = new \Zend\Http\Request();
$req->setUri('http://monsite/stockst');

$match = $route->match($req);
if ($match !== null) {
    echo $match->getParam('param1')."\n";
} else {
    echo "ressource non connue \n";
}
