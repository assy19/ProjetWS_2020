<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin-Methods: GET");

if($_SERVER['REQUEST_METHOD'] == 'GET'){

            // La bonne méthode est utilisée

            // include database and object files
        include_once '../../modele/dao/ConnexionManager.php';
        include_once '../objects/article.php';

        $database = new ConnexionManager();

        $db = $database->getInstance();
          
        $article = new Article1($db);

        $stmt = $article->lireArticle();

        $num = $stmt->rowCount();
          
        if($num>0){
          
            $article_arr=array();

            $article_arr["records"]=array();
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                extract($row);
          
                $article_item=array(

                    "id" => $id,
                    "titre" => $titre,
                    "contenu" => $contenu,
                    "categorie" => $categorie,
                    "dateCreation" => $dateCreation,
                    "dateModification" => $dateModification
                );
          
                array_push($article_arr["records"], $article_item);
            }
          
            //  response code - 200 OK

            http_response_code(200);
          
            // Affichage données au format json

            $format =$_GET["format"];

            if($format =='json')
            { 

            echo 



            json_encode($article_arr);
            }
            else
            {
                header("Content-Type: application/xml; charset=UTF-8");

                  $xml =new SimpleXmlElement('<racine/>');

                  $article_node=$xml->addChild('article');

                  foreach ($article_arr as $article) {

                    foreach ($article as $key) {

                    $article_node->addChild('id',$key['id']);
                    $article_node->addChild('titre',$key['titre']);
                    $article_node->addChild('contenu',$key['contenu']);
                    $article_node->addChild('categorie',$key['categorie']);
                    $article_node->addChild('dateCreation',$key['dateCreation']);
                    $article_node->addChild('dateModification',$key['dateModification']);

                    }
                      
                  }
                 // var_dump($xml->asXML());
                  echo $xml->asXML();
            }
        }
        else
        {
            http_response_code(404);
          
            echo json_encode(
                array("message" => "Cette categorie ne possede pas d'articles.")
            );
        }

}
else
{
    // Mauvaise méthode, Message d'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}




?>