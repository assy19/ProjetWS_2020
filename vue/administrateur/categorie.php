<?php 
    require_once 'haut.php';
?>
<?php 
    if (isset($_POST['submitA']) && isset($_POST['libelle'])){
        if (!empty($_POST['libelle'])){
            $controller->addCategorie($_POST['libelle']);
            $categories = Categorie::getList();
        }
    }

    if (isset($_POST['submitM']) && isset($_POST['libelle']) && isset($_POST['id'])){
        if (!empty($_POST['libelle']) && !empty($_POST['id'])){
            $controller->updateCategorie($_POST['id'],$_POST['libelle']);
            $categories = Categorie::getList();
        }
    }

    if (isset($_POST['submitS']) && isset($_POST['id'])){
        if (!empty($_POST['id'])){
            $controller->deleteCategorie($_POST['id']);
            $categories = Categorie::getList();
        }
    }
?>
<div class="" id="bottom">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterCategorie" style="margin:20px;">Ajouter + </button>
                <div class="row" id="">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $categorie): ?>
                        <div class="categorie">
                            <h1 style="text-align: center;"><a href="index.php?action=categorie&id=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></h1>
                            
                            <button type="button" class="btn btn-danger" style="float:right;" data-toggle="modal" data-target="#supprimerCategorie<?= $categorie->id ?>">Supprimer</button>
                            <button type="button" class="btn btn-warning" style="float:right;margin-right:2px;" data-toggle="modal" data-target="#modifierCategorie<?= $categorie->id ?>">Modifier</button>
                        </div>
                        <div class="modal" id="modifierCategorie<?= $categorie->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                        <h1 class="modal-title" style="color:#2e492de3;">Modifier une categorie</h1>
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <form action="#" method="POST">
                                            <div class="form-group">
                                                <label for="libelle">Libelle</label>
                                                <input type="text" class="form-control" id="libelleCategorie" name="libelle" value="<?= $categorie->libelle ?>" placeholder="Entrer le libelle de la Categorie">
                                            </div>
                                            <input type="hidden"  name="id" value="<?= $categorie->id ?>" >
                                            <div class="form-group">
                                               
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
                        <div class="modal" id="supprimerCategorie<?= $categorie->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                        <h2 class="modal-title" style="color:#2e492de3;">Supprimer cette categorie</h2>
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <span>Etes vous sure de vouloir supprimer cette Categorie ?</span>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?= $categorie->id ?>">
                                            <button type="submit" name="submitS" class="btn btn-danger">Supprimer</button>
                                        </form>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <?php else: ?>
                        <div class="message">Aucun Categorie trouvé</div>
                <?php endif ?>
            </div>
            </div>
        </div>
</div>
<div class="modal" id="ajouterCategorie">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h1 class="modal-title" style="color:#2e492de3;">Ajouter une categorie</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" name="libelle" id="libelleCategorie" placeholder="Entrer le libelle de la categorie">
                </div>
                <button type="submit" name="submitA" class="btn btn-success">Ajouter</button>
            </form>
        </div>
        
        <div class="modal-footer">
            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
        
      </div>
    </div>
</div>
<div class="modal" id="modifierCategorie">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h1 class="modal-title" style="color:#2e492de3;">Modifier une categorie</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" id="libelleCategorie" placeholder="Entrer le libelle de la Categorie">
                </div>
            </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-warning">Modifer</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
        
      </div>
    </div>
</div>
<div class="modal" id="supprimerCategorie">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h2 class="modal-title" style="color:#2e492de3;">Supprimer cette categorie</h2>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <div class="modal-body">
            <span>Etes vous sure de vouloir supprimer cette Categorie ?</span>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-danger">Supprimer</button>
            
        </div>
        
      </div>
    </div>
</div>
<?php 
    require_once 'bas.php';
?>
