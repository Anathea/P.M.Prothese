<?php
// DONNÉES
//Connexion à la base de donnée + outils utiles
require 'requetes.php';
require 'tools.php';

//Bloc récupération de données (fait en objet ! :D )
$db = new DB();
$patients = $db->get_patients();



// AFFICHAGE
require 'header.php';
?>

    <main class="wrap clearfix medecin">
        <div class="doctor">
            <h1>Dr Maison</h1>
            <h2>Angervillier (91)</h2>
        </div>
        <div class="buttons">
            <a href="#">MESSAGERIE</a>
            <a href="new_patient.php">NOUVEAU PATIENT</a>
            <a href="#">changer mon mot de passe</a>
        </div>
        <div class="tableau clearfix">
            <table>
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Sécurité Sociale</th>
                        <th>Allergie</th>
                        <th>Prothèse</th>
                    </tr>
                </thead>
                
                //Affichage de tous les patients
                <?php foreach ($patients as $one_patient) { ?>
                <tr>
                    <td class="prenom"><?=$one_patient['prenom']?></td>
                    <td class="nom"><?=$one_patient['nom']?></td>
                    <td class="numero"><?=$one_patient['secu']?></td>
                    <td class="allergie"><?=allergieOuPas($one_patient['allergie'])?></td>
                    <td class="prothese">En attente</td>
                    <td class="details"><a href="page_patient.php?id='<?=$one_patient['id']?>'" class="details">Détails</a></td>
                    <td class="change"><a href="update_patient.php?id='<?=$one_patient['id']?>'" class="change">Modifier</a></td>
                    <td class="delete"><a href="delete.php?id='<?=$one_patient['id']?>'" class="delete">Supprimer</a></td>
                </tr>
                <?php } ?>
                
            </table>
        </div>
    </main>

<?php require 'footer.php';

