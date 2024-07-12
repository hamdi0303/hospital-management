<?php

class Medecin
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
    }

    //La liste des medecins
    function listeMedecins()
    {
        return $this->db->query("select * from medecin");
    }

    //ajout de medecin
    function addM($data){//$_GET, $_POST
        $n = $data['nom'];
        $p = $data['prenom'];
        $s = $data['specialite'];
        $this->db->exec("insert into medecin values ('','$n','$p','$s') ");
    }

    //Delete
    function deleteM($id)
    {
        $this->db->exec("delete from medecin where id='$id'");
    }

    // get medecin by id
    function getMedecinById($id){
        return $this->db->query("select * from medecin where id='$id'")->fetch();
    }

    //MAJ
    function updateC($data){
        $n = $data['nom'];
        $p = $data['prenom'];
        $s = $data['specialite'];
        $id = $data['idM'];
        $this->db->exec("update medecin set nom ='$n', prenom='$p', specialite='$s' where id='$id'");

    }
}