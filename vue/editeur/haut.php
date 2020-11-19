<?php 
    session_start();
    require_once 'controleur/Controller.php';
    $articles = Article::getList();
    $categories = Categorie::getList();
    $controller = new Controller();
    $user = User::getById($_GET['id']);
    $_SESSION['id'] = $user->id;
    $_SESSION['nom'] = $user->nom;
    $_SESSION['prenom'] = $user->prenom;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Actualités MGLSI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="">
  
    <div class="row">
        <div class="col-2" id="menu">
            <img src="assets/img/user.png" width="120px" alt="">
            <h3>
                <?php 
                    echo $user->prenom.' '.$user->nom; 
                ?>
            </h3>
            <h6>Editeur</h6>
            <ul>
                <li><a href="index.php?action=editeur&choix=1&id=<?php echo $_SESSION['id']?>">Article</a></li>
                <li><a href="index.php?action=editeur&choix=2&id=<?php echo $_SESSION['id']?>">Catégories</a></li>
            </ul>
            
            <p>&nbsp;<p>
        </div>
        <div class="col-10" id="contain">
            <div class="row" id="top">
                <h4><a href="index.php?action=connexion">Deconnexion</a></h4>
            </div>