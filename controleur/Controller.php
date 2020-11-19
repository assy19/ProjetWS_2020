<?php
	// require_once 'modele/dao/ArticleDao.php';
	// require_once 'modele/dao/CategorieDao.php';
	require_once 'modele/Article.php';
	require_once 'modele/Categorie.php';
	require_once 'modele/User.php';
	require_once 'modele/Jeton.php';
	require_once 'modele/ConnexionManager.php';

	/**
	 * Classe représentant notre controleur principal
	 */
	class Controller
	{
		
		function __construct()
		{
			
		}

		public function showAccueil()
		{
			$articles = Article::getList();
			$categories = Categorie::getList();

			require_once 'vue/accueil.php';
		}

		public function showArticle($id)
		{
			$article = Article::getById($id);
			$categories = Categorie::getList();
			
			require_once 'vue/article.php';
		}

		public function showCategorie($id)
		{
			$articles = Article::getByCategoryId($id);
			$categories = Categorie::getList();
			
			require_once 'vue/articleByCategorie.php';
		}

		public function showConnexion()
		{
			require_once 'vue/connexion.php';
		}

		public function showEditeur($choix)
		{
			if ($choix == 1)
			{
				
				require_once 'vue/editeur/article.php';
		
			}else{

				require_once 'vue/editeur/categorie.php';

			}
			
		}

		public function showAdministrateur($choix)
		{
			if ($choix == 1)
			{
				
				require_once 'vue/administrateur/article.php';
		
			}else if ($choix == 2)
			{
				
				require_once 'vue/administrateur/categorie.php';
		
			}
			else if ($choix == 3)
			{
				
				require_once 'vue/administrateur/user.php';
		
			}
			else{

				require_once 'vue/administrateur/jeton.php';

			}
			
		}
	
		public function addArticle($titre,$contenu,$categorie){
			Article::addArticle($titre,$contenu,$categorie);
		}

		public function updateArticle($id,$titre,$contenu,$categorie){
			Article::updateArticle($id,$titre,$contenu,$categorie);
		}

		public function deleteArticle($id){
			Article::deleteArticle($id);
		}

		public function addCategorie($libelle){
			Categorie::addCategorie($libelle);
		}

		public function updateCategorie($id,$libelle){
			Categorie::updateCategorie($id,$libelle);
		}

		public function deleteCategorie($id){
			Categorie::deleteCategorie($id);
		}

		public function addUser($nom,$prenom,$typeC,$email,$pseudo,$password){
			User::addUser($nom,$prenom,$typeC,$email,$pseudo,$password);
		}

		public function updateUser($id,$nom,$prenom,$typeC,$email,$pseudo,$password){
			User::updateUser($id,$nom,$prenom,$typeC,$email,$pseudo,$password);
		}

		public function deleteUser($id){
			User::deleteUser($id);
		}

		public function addJeton($pseudo,$service){
			Jeton::addJeton($pseudo,$service);
		}

		public function updateJeton($id,$pseudo,$service){
			Jeton::updateJeton($id,$pseudo,$service);
		}

		public function deleteJeton($id){
			Jeton::deleteJeton($id);
		}

		
	}
?>