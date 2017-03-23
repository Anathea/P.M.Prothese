<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "header.php";
?>

<h2>Ajouter un nouveau patient :</h2>
        <form method="post" action="do_new_patient.php">
		<div>
			<label for="nom">Nom du patient :</label>
			<input type="text" name="nom" id="nom" required>
		</div>
		<div>
			<label for="prenom">Prénom du patient :</label>
			<input type="text" name="prenom" id="prenom" required>
		</div>
                <div>
			<label for="secu">Numéro de sécurité sociale :</label>
			<input type="text" name="secu" id="secu" required>
		</div>
                <div>
			<label for="allergie">Allergie(s) :</label>
			<input type="text" name="allergie" id="allergie" >
		</div>
                <div>
			<label for="type">Type de prothèse :</label>
			<select name="type" id="type">
                                <option value="esthétique">Esthétique</option>
                                <option value="fonctionnelle">Fonctionnelle</option>
                                <option value="myoélectrique">Myoélectrique</option>
			</select>
		</div>
                <div>
			<label for="caracteristique">Caractéristique de la prothèse</label>
                        <p style="display: inline-block; padding-right: 50px;">Solidité</p><p style="display: inline-block; padding-left: 50px;">Légèreté</p>
                        <br>
                        <input id="caracteristique" type="range" min="0" max="2" step="1">
		</div>
                <div>
                    <input type="checkbox" name="detachable" id="detachable" value="1">
                    <label for="detachable">Prothèse amovible</label>
                </div>
		<div>
			<label for="longueur">Longueur :</label>
                        <input type="longueur" name="longueur" id="longueur">
		</div>
		<div>
			<label for="largeur">Largeur :</label>
                        <input type="largeur" name="largeur" id="largeur">
		</div>
		<div>
			<input type="submit" name="action" id="action" 
                        value="Ajouter">
		</div>
	</form>

<?php require 'footer.php';
