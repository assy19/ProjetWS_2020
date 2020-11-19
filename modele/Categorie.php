<?php
	/**
	 * Classe métier représentant une catégorie
	 */
	class Categorie
	{
		public $id;
		public $libelle;

		// private $bdd;

		// public function __construct()
		// {
		// 	$this->bdd = ConnexionManager::getInstance();
		// }

		public static function getList()
		{
			$bdd = ConnexionManager::getInstance();
			$reponse = $bdd->query('SELECT * FROM Categorie');
			$data = $reponse->fetchAll(PDO::FETCH_CLASS, 'Categorie');
			$reponse->closeCursor();
			return $data;
		}

		public static function getById($id)
		{
			$bdd = ConnexionManager::getInstance();
			$reponse = $bdd->query('SELECT * FROM Categorie WHERE id = '.$id);
			$data = $reponse->fetch(PDO::FETCH_OBJ);
			$reponse->closeCursor();
			return $data;
		}

		public function addCategorie($libelle){

			$bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("INSERT INTO Categorie(libelle) VALUES (?)");
            $insert->execute(array($libelle));
            return true;
		}

		public function updateCategorie($id,$libelle){

			$bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("UPDATE Categorie SET libelle = ? WHERE Categorie.id = ?");
            $insert->execute(array($libelle,$id));
            return true;
		}

		public function deleteCategorie($id){
			
			$bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("DELETE FROM Categorie WHERE id = ?");
            $insert->execute(array($id));
            return true;
		}
	}
?>