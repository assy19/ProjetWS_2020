<?php

    function str_compare($str_1,$str_2){

        if($str_1 == $str_2) return TRUE;
        else return FALSE;
    }

    require_once 'modele/ConnexionManager.php';   
    session_start();
    $instancebdd = ConnexionManager::getInstance();
    
    if (isset($_POST['submit']) && isset($_POST['pseudo']) && isset($_POST['password'])){
        
        $query = $instancebdd->prepare("SELECT * FROM User WHERE pseudo = ?");
        $query->execute([$_POST['pseudo']]);
        $user = $query->fetch();
       
        if ($user && str_compare($user['password'],sha1($_POST['password']))){
            if ($user['typeC'] == "editeur") {
                header('Location: index.php?action=editeur&choix=1&id='.$user['id']);
            }
            else {
                header('Location: index.php?action=administrateur&choix=1&id='.$user['id']);
            }
        } else {
            echo "<span style='font-size:40px;color:red;font-weight:bold;margin-left:660px;'>Mot de passe incorrect !!!</span>";
            
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Actualités MGLSI</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        body{
            background-color: rgb(108 132 90);
        }
        #cadreConnexion{
            width: 600px;
            height : 510px;
            background-color: rgb(46, 73, 45 ,0.89);
            margin-left:35%;
            margin-top:6%;
            border-radius:20px;
        }
        input[type=text], input[type=password]{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

       

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            color: white;
            font-size:22px;
        }

        input[type=submit] {
            background-color: #bcbcc1;
            color: #355032;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 40%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        img{
            margin-left:34%;
            margin-top : 5%;
            margin-bottom : 5%;
        }
        #inp{
            margin-left:20%;
        }
        a{
            color : darkgoldenrod;
            font-size : 21px;
        }
    </style>
</head>
<body>
	<div id="cadreConnexion">
        <img src="assets/img/log.png" width="30%" alt="">
        <form action="" method="POST">
            <div id="inp">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Pseudo</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="pseudo" name="pseudo" placeholder="Entrer votre pseudo...">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Password</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="password" name="password" placeholder="Entrer votre password...">
                    </div>
                </div>
                <div class="row" style="margin-left: 39%;margin-top:5%">
                    <input type="submit" name="submit" value="Se connecter">
                </div>
                <a href="#">Mot de passe oublié ?</a> <br><br>
                <a href="index.php" style="text-decoration:none;color:#2b2f3c;font-weight:bold;">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>