<?php
	/**
	 * Classe métier représentant une jeton
	 */
	class Jeton
	{
		public $id;
        public $pseudo;
        public $service;
        public $valeur;

		public static function getList()
		{
			$bdd = ConnexionManager::getInstance();
			$reponse = $bdd->query('SELECT * FROM Jeton');
			$data = $reponse->fetchAll(PDO::FETCH_CLASS, 'Jeton');
			$reponse->closeCursor();
			return $data;
		}

		public static function getById($id)
		{
			$bdd = ConnexionManager::getInstance();
			$reponse = $bdd->query('SELECT * FROM Jeton WHERE id = '.$id);
			$data = $reponse->fetch(PDO::FETCH_OBJ);
			$reponse->closeCursor();
			return $data;
		}

		public function addJeton($pseudo,$service){

			$bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("INSERT INTO Jeton(pseudo,service,valeur) VALUES (?,?,?)");
			$insert->execute(array($pseudo,$service,uniqid()));
            return true;
        }
        
		public function updateJeton($id,$pseudo,$service){

			$bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("UPDATE Jeton SET pseudo = ? , service = ? , valeur = ?  WHERE Jeton.id = ?");
            $insert->execute(array($pseudo,$service,uniqid(),$id));
            return true;
		}

		public function deleteJeton($id){
			
			$bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("DELETE FROM Jeton WHERE id = ?");
            $insert->execute(array($id));
            return true;
		}
	}
?>