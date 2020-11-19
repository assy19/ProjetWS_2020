<?php
require_once '../../modele/domaine/Article.php';
include_once '../../modele/dao/ConnexionManager.php';



class Article1{
  
    // database connection and table name
    private $conn;
    private $table_name = "Article";
  
    // object properties
   
        // public $id;
        // public $titre;
        // public $contenu;
        // public $categorie;
        // public $dateCreation;
        // public $dateModification;
  
    // constructor with $db as database connection
    
    public function __construct($db){
        $database = new ConnexionManager();
        $db = $database->getInstance();        
        $this->conn = $db;
    }




     function lireArticle(){
    
    // select all query
     $query = "SELECT
                 c.titre as category_titre, p.id, p.titre, p.contenu, p.categorie, p.dateCreation, p.dateModification
             FROM
                 " . $this->table_name . " p
                LEFT JOIN
                    Article c
                        ON p.categorie = c.id
                       ORDER BY
                  p.dateCreation DESC";
  
    // prepare query statement
      $stmt = $this->conn->prepare($query);
  
     // execute query
     $stmt->execute();
  
     return $stmt;
   
     }

      function readbyCategorie(){
    
    // select all query
     $query = "SELECT
                 c.titre as category_titre, p.id, p.titre, p.contenu, p.categorie, p.dateCreation, p.dateModification
             FROM
                 " . $this->table_name . " p
                LEFT JOIN
                    Article c
                        ON p.Categorie = c.id
                       ORDER BY
                  p.categorie DESC";
  
    // prepare query statement
      $stmt = $this->conn->prepare($query);
  
     // execute query
     $stmt->execute();
  
     return $stmt;
     }


    public function lireUn($categoriee){

    $categoriee = $_GET["categoriee"];

    // On écrit la requête
    $sql = "SELECT  id, titre, contenu,categorie,dateCreation, dateModification
            FROM Article
            Where categorie=$categoriee";

    // On prépare la requête
    $query = $this->conn->prepare( $sql );

    $query->execute();

    return $query;
    
  }
 }

?>