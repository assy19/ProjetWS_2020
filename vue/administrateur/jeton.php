<?php 
    require_once 'haut.php';
?>
<?php 
    if (isset($_POST['submitA']) && isset($_POST['pseudo']) && isset($_POST['service'])){
        if (!empty($_POST['pseudo']) && !empty($_POST['service'])){
            $controller->addJeton($_POST['pseudo'],$_POST['service']);
            $Jetons = Jeton::getList();
        }
    }

    if (isset($_POST['submitM']) && isset($_POST['pseudo']) && isset($_POST['service']) && isset($_POST['id'])){
        if (!empty($_POST['pseudo']) && !empty($_POST['service']) && !empty($_POST['id'])){
            $controller->updateJeton($_POST['id'],$_POST['pseudo'],$_POST['service']);
            $Jetons = Jeton::getList();
        }
    }

    if (isset($_POST['submitS']) && isset($_POST['id'])){
        if (!empty($_POST['id'])){
            $controller->deleteJeton($_POST['id']);
            $Jetons = Jeton::getList();
        }
    }
 
?>
<div class="" id="bottom">
    <?php 
        //$controller->addJeton("DIOP","Mouamed","editeur","mou@gmail.com","mouhamed","passer");
        //$controller->updateJeton(4,"DIOP","Mouhamed","admin","mouh@gmail.com","mouhamed","passer");
        //$controller->deleteJeton(5);
    ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterJeton" style="margin:20px; height:40px;">Ajouter + </button>
    <div class="row" id="">
    <?php if (!empty($Jetons)): ?>
    <table class="table table-bordered" style="background-color: #c4c6b7;width: 1100px;margin-left:20px;">  
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Service</th>
                <th scope="col">Valeur</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($Jetons as $Jeton): ?>
                    <tr>
                        <th scope="row"><?= $Jeton->id ?></th>
                        <td><?= $Jeton->pseudo ?></td>
                        <td><?= $Jeton->service ?></td>
                        <td><?= $Jeton->valeur ?></td>
                        <td>
                            <button type="button" class="btn btn-danger" style="float:right;" data-toggle="modal" data-target="#supprimerJeton<?= $Jeton->id ?>">Supprimer</button>
                            <button type="button" class="btn btn-warning" style="float:right;margin-right:2px;" data-toggle="modal" data-target="#modifierJeton<?= $Jeton->id ?>">Modifier</button>
                        </td>
                    </tr>
                    <div class="modal" id="modifierJeton<?= $Jeton->id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <div class="modal-header">
                                    <h1 class="modal-title" style="color:#2e492de3;">Modifier un Jeton</h1>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                
                                <div class="modal-body">
                                    <form action="#" method="POST">
            
                                        <div class="form-group">
                                            <label for="pseudo">Pseudo</label>
                                            <select class="form-control" name="pseudo">
                                            <option value="<?= $Jeton->pseudo ?>"><?= $Jeton->pseudo ?></option>
                                                <?php if (!empty($users)): ?>
                                                    <?php foreach ($users as $user): ?>
                                                        <option value="<?= $user->pseudo ?>"><?= $user->pseudo ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="service">Service</label>
                                            <select class="form-control" name="service">
                                                <option value="<?= $Jeton->service ?>"><?= $Jeton->service ?></option>
                                                <option value="REST">REST</option>
                                                <option value="SOAP">SOAP</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $Jeton->id ?>">
                                        <button type="submit" name="submitM" class="btn btn-warning">Modifer</button>
                                    </form>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="supprimerJeton<?= $Jeton->id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" style="color:#2e492de3;">Supprimer ce Jeton</h2>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                
                                <div class="modal-body">
                                    <span>Etes vous sure de vouloir supprimer ce Jeton ?</span>
                                </div>
                                
                                <div class="modal-footer">
                                    <form action="#" method="POST">
                                        <input type="hidden" name="id" value="<?= $Jeton->id ?>">
                                        <button type="submit" name="submitS" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php else: ?>
                    <div class="message">Aucun Jeton trouvé</div>
            <?php endif ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
<div class="modal" id="ajouterJeton">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h1 class="modal-title" style="color:#2e492de3;">Ajouter un Jeton</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <div class="modal-body">
            <form action="#" method="POST">
                
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <select class="form-control" name="pseudo">
                    <option>---Selectionner---</option>
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user->pseudo ?>"><?= $user->pseudo ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <select class="form-control" name="service">
                        <option>---Selectionner---</option>
                        <option value="REST">REST</option>
                        <option value="SOAP">SOAP</option>
                    </select>
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

  <?php 
    require_once 'bas.php';
?>