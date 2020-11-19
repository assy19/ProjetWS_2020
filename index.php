<?php
	require_once 'controleur/Controller.php';
	//require_once 'controleur/verification.php';

	$controller = new Controller();

	if (!isset($_GET['action']))
	{
		if (isset($_GET['pseudo']))
			{
				$controller->showEditeur(1);
			}
		else {
			$controller->showAccueil();
		}
		
	}
	else
	{
		if (strtolower($_GET['action']) === 'article')
		{
			if (isset($_GET['id']))
			{
				$controller->showArticle($_GET['id']);
			}
			else
			{
				$controller->ShowErrorPage();
			}
		}
		else if (strtolower($_GET['action']) === 'categorie')
		{
			if (isset($_GET['id']))
			{
				$controller->showCategorie($_GET['id']);
			}
			else
			{
				$controller->ShowErrorPage();
			}
		}
		else if (strtolower($_GET['action']) === 'connexion')
		{
			
			$controller->showConnexion();
	
		}
		else if (strtolower($_GET['action']) === 'editeur')
		{
			
			$controller->showEditeur($_GET['choix']);
	
		}
		else if (strtolower($_GET['action']) === 'administrateur')
		{
			
			$controller->showAdministrateur($_GET['choix']);
	
		}
		else
		{
			$controller->showAccueil();
		}
	}
?>