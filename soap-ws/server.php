<?php

  // require_once $_SERVER['DOCUMENT_ROOT'] . '/nusoap-0/lib/nusoap.php';

     require_once ("nusoap.php");
     require('../modele/User.php');
   // include ('../modele/dao/authentificationUser.php');

    // Create the server instance
    $server = new soap_server();
    $server -> configureWSDL ('server', 'urn:server');

    

    // Register the "hello" method to expose it

   /*$server -> register ("User.authentification",
                       array('pseudo'=> 'xsd:string',
                             'password' => 'xsd:string'),
                       array('return' => 'xsd:string'));*/
    
    $server -> register ("User.getListUsersoap",
                        array(),
                        array('return' => 'xsd:json'));

    $server -> register ("User.addUser",
                        array(  'nom' =>'xsd:string',
                        'prenom' => 'xsd:string',
                        'typeC'  =>'xsd:string',
                        'email' => 'xsd:string',
                        'pseudo'=>'xsd:string',
                        'password'=>'xsd:string'),
                         array('return' => 'xsd:arrays'));


$server -> register ("User.updateUser",
                        array('id' => 'xsd:string',
                        'nom' =>'xsd:string',
                        'prenom' => 'xsd:string',
                        'typeC'  =>'xsd:string',
                        'email' => 'xsd:string',
                        'pseudo'=>'xsd:string',
                        'password'=>'xsd:string'),
                         array('return' => 'xsd:arrays'));

 $server -> register ("User.deleteUser",
                        array('id'=> 'xsd:string'),
                        array('return' => 'xsd:arrays'));


    

  @$server->service(file_get_contents("php://input"));
?>