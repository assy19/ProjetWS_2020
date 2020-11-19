<?php 
    
    require_once 'haut.php';
?>
<?php 
    if (isset($_POST['submitA']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['typeC']) && isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['password'])){
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['typeC']) && !empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['password'])){
            $controller->addUser($_POST['nom'],$_POST['prenom'],$_POST['typeC'],$_POST['email'],$_POST['pseudo'],$_POST['password']);
            $users = User::getList();
        }
    }

    if (isset($_POST['submitM']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['typeC']) && isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['id'])){
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['typeC']) && !empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['id'])){
            $controller->updateUser($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['typeC'],$_POST['email'],$_POST['pseudo'],$_POST['password']);
            $users = User::getList();
        }
    }

    if (isset($_POST['submitS']) && isset($_POST['id'])){
        if (!empty($_POST['id'])){
            $controller->deleteUser($_POST['id']);
            $users = User::getList();
        }
    }
?>
<div class="" id="bottom">
    <?php 
        //$controller->addUser("DIOP","Mouamed","editeur","mou@gmail.com","mouhamed","passer");
        //$controller->updateUser(4,"DIOP","Mouhamed","admin","mouh@gmail.com","mouhamed","passer");
        //$controller->deleteUser(5);
    ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterUser" style="margin:20px; height:40px;">Ajouter + </button>
    <div class="row" id="">
    <table class="table table-bordered" style="background-color: #c4c6b7;width: 1100px;margin-left:20px;">  
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Type Compte</th>
                <th scope="col">Email</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <th scope="row"><?= $user->id ?></th>
                        <td><?= $user->nom ?></td>
                        <td><?= $user->prenom ?></td>
                        <td><?= $user->typeC ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->pseudo ?></td>
                        <td>
                            <button type="button" class="btn btn-danger" style="float:right;" data-toggle="modal" data-target="#supprimerUser<?= $user->id ?>">Supprimer</button>
                            <button type="button" class="btn btn-warning" style="float:right;margin-right:2px;" data-toggle="modal" data-target="#modifierUser<?= $user->id ?>">Modifier</button>
                        </td>
                    </tr>
                    <div class="modal" id="modifierUser<?= $user->id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <div class="modal-header">
                                    <h1 class="modal-title" style="color:#2e492de3;">Modifier un Utilisateur</h1>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                
                                <div class="modal-body">
                                    <form action="#" method="POST">
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input type="text" class="form-control" name="nom" value="<?= $user->nom ?>" placeholder="Entrer le nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Prenom</label>
                                            <input type="text" class="form-control" name="prenom" value="<?= $user->prenom ?>" placeholder="Entrer le prenom">
                                        </div>
                                        <div class="form-group">
                                            <label for="typeC">Type de Compte</label>
                                            <select class="form-control" name="typeC">
                                                <option value="<?= $user->typeC ?>"><?= $user->typeC ?></option>
                                                <option value="editeur">Editeur</option>
                                                <option value="admin">Administrateur</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="email"></label>
                                            <input type="email" class="form-control" name="email" value="<?= $user->email ?>" placeholder="Entrer l'email">
                                        </div>
                                        <div class="form-group">
                                            <label for="pseudo"></label>
                                            <input type="text" class="form-control" name="pseudo" value="<?= $user->pseudo ?>" placeholder="Entrer le pseudo">
                                        </div>
                                        <div class="form-group">
                                            <label for="password"></label>
                                            <input type="password" class="form-control" name="password" placeholder="Entrer le mot de passe">
                                        </div>
                                        <input type="hidden" name="id" value="<?= $user->id ?>">
                                        <button type="submit" name="submitM" class="btn btn-warning">Modifer</button>
                                    </form>
                                </div>
                                
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="supprimerUser<?= $user->id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" style="color:#2e492de3;">Supprimer cette Utilisateur</h2>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                
                                <div class="modal-body">
                                    <span>Etes vous sure de vouloir supprimer cet Utilisateur ?</span>
                                </div>
                                
                                <div class="modal-footer">
                                    <form action="#" method="POST">
                                        <input type="hidden" name="id" value="<?= $user->id ?>">
                                        <button type="submit" name="submitS" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php else: ?>
                    <div class="message">Aucun user trouvé</div>
            <?php endif ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
<div class="modal" id="ajouterUser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h1 class="modal-title" style="color:#2e492de3;">Ajouter un Utilisateur</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prenom">
                </div>
                <div class="form-group">
                    <label for="typeC">Type de Compte</label>
                    <select class="form-control" id="typeC" name="typeC">
                        <option value="editeur">Editeur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrer l'email">
                </div>
                <div class="form-group">
                    <label for="pseudo"></label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrer le pseudo">
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Entrer le mot de passe">
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