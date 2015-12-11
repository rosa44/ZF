<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/12/15
 * Time: 11:03
 */

return array(
    'router' => array(
        'routes' => array(
            // route principale de l'pplication 127.0.0.1:8080/
            'home' => array(
                // Type de route litteral
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    // Chemin de la route principale
                    'route' => '/',
                    'defaults' => array(
                        // Controler a appeller pour cette route
                        'controller' => 'MiniModule\Controller\Index',
                        // Action a appeller pour cette route
                        'action' => 'index'
                    ),
                ),
            ),
            // Deuxieme route 127.0.0.1:8080/livre
            'livre' =>  array(
                // Type de route litteral
                'type'  =>  'Zend\Mvc\Router\Http\Literal',
                'options'   =>  array(
                    // Chemin de la route livre
                    'route' =>  '/livre',
                    'defaults'  =>  array(
                        // Controler a appeller pour cette route
                        'controller'    =>  'MiniModule\Controller\Bibliotheque',
                        // Action a appeller pour cette route
                        'action'    =>  'index',
                    )
                ),
                // routes enfant de livre
                'child_routes'  =>  array(
                    // Premiere route enfant 127.0.0.1:8080/livre/isbn
                    'isbn'  =>  array(
                        // Type de route segment
                        'type'  =>  'segment',
                        'options'   =>  array(
                            // Chemin de la route isbn
                            'route' =>  '/[:isbn]',
                            // contrainte sur la route
                            'constraints'   =>  array(
                                // ne contient que des chiffres et des tirets
                                'isbn'  =>  '[0-9_-]+',
                            ),
                            'defaults'  =>  array(
                                // Action a appeller pour cette route
                                'action'    =>  'isbn',
                            ),
                        ),
                    ),
                    // Deuxieme route enfant 127.0.0.1:8080/livre/auteur
                    'auteur'  =>  array(
                        // Type de route segment
                        'type'  =>  'segment',
                        'options'   =>  array(
                            // Chemin de la route auteur
                            'route' =>  '/[:auteur]',
                            // contrainte sur la route
                            'constraints'   =>  array(
                                // ne contient que des lettres
                                'auteur'  =>  '[a-zA-Z]+',
                            ),
                            'defaults'  =>  array(
                                // Action a appeller pour cette route
                                'action'    =>  'auteur',
                            ),
                        ),
                    ),
                ),
            ),
        )
    ),


    'view_manager' => array(
        'template_map' => array(
            '404' => __DIR__ . '/../view/404.phtml',
            'error' => __DIR__ . '/../view/error.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',

            // envoie des views apres être passé dans les controllers correspondant
            'mini-module/index/index' => __DIR__ . '/../view/index/index.phtml',
            // vue 127.0.0.1:8080/livre
            'mini-module/bibliotheque/index' => __DIR__ . '/../view/index/index.phtml',
            // vue 127.0.0.1:8080/livre/[isbn]
            'mini-module/bibliotheque/isbn' => __DIR__ . '/../view/livre/livre.phtml',
            // vue 127.0.0.1:8080/livre/[auteur]
            'mini-module/bibliotheque/auteur' => __DIR__ . '/../view/livre/livre.phtml',
        ),
    ),

    // Controllers à utiliser
    'controllers' => array(
        'invokables' => array(
            'MiniModule\Controller\Index' => 'MiniModule\Controller\IndexController',
            'MiniModule\Controller\Bibliotheque' => 'MiniModule\Controller\BibliothequeController',
        )
    )
);