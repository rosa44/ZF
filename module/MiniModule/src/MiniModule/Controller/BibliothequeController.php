<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/12/15
 * Time: 16:01
 */

namespace MiniModule\Controller;

use Zend\View\Helper\ViewModel;
//use Zend\View\Model\ViewModel;


class BibliothequeController extends \Zend\Mvc\Controller\AbstractActionController
{

    private static $data = array(
        "200"   => "toto",
        "100"   =>  "titi"
    );

    public function indexAction()
    {
        return array();
    }


    public function isbnAction()
    {
        // Récupéation de l'isbn de l'URL
        $isbn = $this->getEvent()->getRouteMatch()->getParam('isbn');

        // Si l'ISBN éxiste alors on regarde quel auteur y est associé
        if(array_key_exists($isbn, self::$data)){
            $auteur = self::$data[$isbn];

        }else{
            // TODO
        }

        // Retour du tableau avec l'isbn et l'auteur associé
        return array('isbn'=> $isbn, 'auteur' => $auteur);
    }



// fonction du prof
/*
      public function isbnAction(){
           $isbn = $this->getEvent()->getRouteMAtch()->getParam('isbn');
           $viewModel = new ViewModel(array('isbn' => $isbn));
           if( ! array_key_exists($isbn, self::$data)){
                $viewModel->setTemplate('miniModule/pastrouve');
           }else{
                   $viewModel->setTemplate('miniModule/info-livre');
                   $viewModel->setVariables(array('auteur' => self::$data[$isbn]));
           }
           return $viewModel;
      }
*/

    public function auteurAction()
    {
        // Récupération de l'auteur de l'URL
        $auteur = $this->getEvent()->getRouteMatch()->getParam('auteur');

        // Si l'auteur existe dans le tableau alors on récupére la clef (l'ISBN) associé
        if(array_search($auteur, self::$data)){
            $isbn = array_keys(self::$data, $auteur);
        }else{
            // TODO
        }

        //Retour du tableau avec l'auteur et l'ISBN associé
        return array('auteur'=> $auteur, 'isbn' => $isbn[0]);
    }


    // fonction du prof
    /*
     * public function auteurAction(){
     *      $auteur = $this->getEvent()->getRouteMAtch()->getParam('auteur');
     *      $viewMdoel = new ViewModel(array('auteur' => $auteur));
     *      if( ! array_key_search($auteur, self::$data){
     *           $viewModel->setTemplate('miniModule/pastrouve');
     *      }else{
     *              $viewModel->setTemplate('miniModule/info-livre');
     *              $viewModel->setVariables(array('isbn' => self::$data[$isbn]));
     *      }
     *      return $viewModel;
     * }
     */
}