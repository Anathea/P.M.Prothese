<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DB {
    private $db;
    
    function __construct() {
        $this->db = require 'connect.php';
    }
    
    public function get_patients() {
        $query = $this->db->prepare('SELECT id, nom, prenom, secu, allergie, type, caracteristique, detachable, longueur, largeur
            FROM patients');
        $query->execute();
        return $query->fetchAll();
    }
    
    public function get_one_patient($id) {
        $query = $this->db->prepare('SELECT id, nom, prenom, secu, allergie, type, caracteristique, detachable, longueur, largeur
            FROM patients
            WHERE id = :id
            LIMIT 1');
        $query->execute([ ':id' => $id ]);
        return $query->fetch();
    }
    
    public function add_one_patient($nom, $prenom, $secu, $allergie, $type, $caracteristique, $detachable, $longueur, $largeur) {
        $query = $this->db->prepare('INSERT 
            INTO patients (nom, prenom, secu, allergie, type, caracteristique, detachable, longueur, largeur)
            VALUES (:nom, :prenom, :secu, :allergie, :type, :caracteristique, :detachable, :longueur, :largeur)');
        $query->execute([ ':nom' => $nom, 
            ':prenom' => $prenom,
            ':secu' => $secu,
            ':allergie' => $allergie, 
            ':type' => $type,
            ':caracteristique' => $caracteristique,
            ':detachable' => $detachable,
            ':longueur' => $longueur,
            ':largeur' => $largeur ]);
    }
    
    public function update_one_patient($id, $nom, $prenom, $secu, $allergie, $type, $caracteristique, $detachable, $longueur, $largeur) {
        $query = $this->db->prepare('UPDATE patients 
            SET 
              nom = :nom,
              prenom = :prenom,
              secu = :secu,
              allergie = :allergie,
              type = :type,
              caracteristique = :caracteristique,
              detachable = :detachable,
              longueur = :longueur,
              largeur = :largeur
            WHERE id = :id');
        $query->execute([ ':id' => $id,
            ':nom' => $nom, 
            ':prenom' => $prenom,
            ':secu' => $secu,
            ':allergie' => $allergie, 
            ':type' => $type,
            ':caracteristique' => $caracteristique,
            ':detachable' => $detachable,
            ':longueur' => $longueur,
            ':largeur' => $largeur ]);
    }

    public function del_one_patient($id) {
    $query = $this->db->prepare('DELETE 
        FROM patients 
        WHERE id = :id');
    $query->execute([ ':id' => $id ]);
    }
}



