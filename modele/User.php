<?php
	/**
	 * Classe métier représentant un user
	 */
	require_once 'ConnexionManager.php';
	class User
	{
		public $id;
		public $nom;
		public $prenom;
		public $typeC;
		public $email;
        public $pseudo;
        public $password;

		// private $bdd;

		// public function __construct()
		// {
		// 	$this->bdd = ConnexionManager::getInstance();
		// }

		public static function getListUsersoap()
		{
			$bdd = ConnexionManager::getInstance();
			$data = $bdd->query('SELECT * FROM User');
			$users = $data->fetchAll(PDO::FETCH_CLASS, 'User');
			$data->closeCursor();
			  return json_encode($users);
		}

		public static function getList()
		{
			$bdd = ConnexionManager::getInstance();
			$data = $bdd->query('SELECT * FROM User');
			$users = $data->fetchAll(PDO::FETCH_CLASS, 'User');
			$data->closeCursor();
			return $users;
		}

		public static function getById($id)
		{
			$bdd = ConnexionManager::getInstance();
			$data = $bdd->query('SELECT * FROM User WHERE id = '.$id);
			$user = $data->fetch(PDO::FETCH_OBJ);
			$data->closeCursor();
			return $user; 
		}

		public function addUser($nom,$prenom,$typeC,$email,$pseudo,$password){

            $bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("INSERT INTO User(nom,prenom,typeC,email,pseudo,password) VALUES (?,?,?,?,?,?)");
            $insert->execute(array($nom,$prenom,$typeC,$email,$pseudo,sha1($password)));
            return true;
        }
        
		public function updateUser($id,$nom,$prenom,$typeC,$email,$pseudo,$password){

            $bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("UPDATE User SET nom = ? ,prenom = ?, typeC = ?, email = ?, pseudo = ?, password = ? WHERE User.id = ?");
            $insert->execute(array($nom,$prenom,$typeC,$email,$pseudo,sha1($password),$id));
            return true;

		}
		public function deleteUser($id){
            $bdd = ConnexionManager::getInstance();
			$insert = $bdd->prepare("DELETE FROM User WHERE id = ?");
            $insert->execute(array($id));
            return true;
		}
	}
?>