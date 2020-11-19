<?php 
    require_once 'haut.php';
?>
<?php 
    if (isset($_POST['submitA']) && isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['categorie'])){
        if (!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['categorie'])){
            $controller->addArticle($_POST['titre'],$_POST['contenu'],$_POST['categorie']);
            $articles = Article::getList();
        }
    }

    if (isset($_POST['submitM']) && isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['categorie']) && isset($_POST['id'])){
        if (!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['categorie']) && !empty($_POST['id'])){
            $controller->updateArticle($_POST['id'],$_POST['titre'],$_POST['contenu'],$_POST['categorie']);
            $articles = Article::getList();
        }
    }

    if (isset($_POST['submitS']) && isset($_POST['id'])){
        if (!empty($_POST['id'])){
            $controller->deleteArticle($_POST['id']);
            $articles = Article::getList();
        }
    }
?>
<div class="row" id="bottom">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterArticle" style="margin:20px; float:right;">Ajouter + </button>
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="article">
                        <h1 style="text-align: center;"><a href="index.php?action=article&id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
                        <p><?= substr($article->contenu, 0, 300) . '...' ?></p>
                        
                        <button type="button" class="btn btn-danger" style="float:right;" data-toggle="modal" data-target="#supprimerArticle<?= $article->id ?>">Supprimer</button>
                        <button type="button" class="btn btn-warning" style="float:right;margin-right:2px;" data-toggle="modal" data-target="#modifierArticle<?= $article->id ?>" data="">Modifier</button>
                    </div>
                    <div class="modal" id="modifierArticle<?= $article->id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" style="color:#2e492de3;">Modifier un article</h1>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                            
                                <div class="modal-body">
                                    <form action="#" method="POST">
                                        <div class="form-group">
                                            <label for="titre">Titre</label>
                                            <input type="text" class="form-control" id="titrearticle" name="titre" value="<?= $article->titre ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="contenu">Contenu</label>
                                            <textarea class="form-control" id="contenu" name="contenu" rows="3"> <?= $article->contenu ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="categorie">Categorie</label>
                                            <select class="form-control" id="categorie" name="categorie">
                                                <option value="<?= $article->categorie ?>"><?= $article->categorie ?></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?= $article->id ?>">
                                            <button type="submit" name="submitM" class="btn btn-warning">Modifer</button>
                                        </div>
                                        
                                    </form>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="supprimerArticle<?= $article->id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <div class="modal-header">
                                    <h1 class="modal-title" style="color:#2e492de3;">Supprimer un article</h1>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                
                                <div class="modal-body">
                                    <span>Etes vous sure de vouloir supprimer cette article ?</span>
                                </div>
                                
                                <div class="modal-footer">
                                    <form action="#" method="POST">
                                        <input type="hidden" name="id" value="<?= $article->id ?>">
                                        <button type="submit" name="submitS" class="btn btn-danger">Supprimer</button>
                                    </form> 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php else: ?>
                    <div class="message">Aucun article trouvé</div>
            <?php endif ?>
        </div>
    </div>
</div>
<div class="modal" id="ajouterArticle">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h1 class="modal-title" style="color:#2e492de3;">Ajouter un article</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name="titre" id="titrearticle" placeholder="Entrer le titre de l'article">
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="3" ></textarea>
                </div>
                <div class="form-group">
                    <label for="categorie">Categorie</label>
                    <select class="form-control" id="categorie" name="categorie">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <button type="submit" name="submitA" class="btn btn-success" >Ajouter</button>
            </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
        
      </div>
    </div>
</div>
<?php 
    require_once 'bas.php';
?>