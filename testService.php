<?php 
namespace Upjv\LicPro;
require './vendor/autoload.php';
class LicencePro{

     static $NbrInstance = 0; 
    

     function __construct()
     { 
       self::$NbrInstance++;
       
      }
      
      function __destruct() 
      {
         self::$NbrInstance--; 
       }
      
       static function getNbrInstance()
        {
          return self::$NbrInstance;
        }
}

$sm = new \Zend\ServiceManager\ServiceManager();
$smc = new \Zend\ServiceManager\Config(include 'config.php'); 
$smc ->configureServiceManager($sm); 

//$sm->setInvokableClass('promo','LicencePro'); 
$sm->setShared('Upjv\LicPro\LicencePro', false); 

$obj = $sm->get('Upjv\LicPro\LicencePro'); 
echo LicencePro::getNbrInstance()."\n"; 
$obj1 = $sm->get('Upjv\LicPro\LicencePro'); 
echo LicencePro::getNbrInstance()."\n"; 










