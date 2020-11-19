<?php

    require_once ('nusoap.php');

    // Webservice server WSDL URL address
    $wsdl = "http://localhost/projetWS/soap-ws/server.php?wsdl";

    // Create client object
    $client = new nusoap_client($wsdl, 'wsdl');

    // Call the hello method
    /*$result1=$client->call('User.addUser',array(
    											'nom' => 'diop',
    											'prenom' => 'moo',
    											'typeC' => 'admin',
    											'email' => 'mb@g.cv',
    											'pseudo' => 'mse',
    											'password' => 'mbae'
    									
    	                                        ));*/
     
  $result1=$client->call('User.deleteUser',array('id' => '10'));
   // $result1 = $client -> call ('hello', array ('username' => 'Adja'));
    /*$result1=$client->call('User.authentification',array(
    											'pseudo' => 'mse',
    											'password' => 'mbae'
    									
    	                                        ));*/
     echo $result1 ;
   // echo "string";
?>