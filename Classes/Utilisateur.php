<?php

class Utilisateur
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
    }

    //La liste des medecins
    function listeUtilisateurs()
    {
        return $this->db->query("select * from utilisateur");
    }

    //ajout d'utilisateur (inscription)
    function addU($data){//$_GET, $_POST
        $n = $data['nom'];
        $pr = $data['prenom'];
        $e = $data['email'];
        $p = $data['password'];
        $ph = $data['phone'];
        $this->db->exec("insert into utilisateur values ('','$n','$pr','$e','$p','$ph','user') ");
    }

    //ajout d'utilisateur (par admin)
    function addUA($data)
    {//$_GET, $_POST
        $n = $data['nom'];
        $pr = $data['prenom'];
        $e = $data['email'];
        $p = $data['password'];
        $ph = $data['phone'];
        $r = $data['role'];
        $this->db->exec("insert into utilisateur values ('','$n','$pr','$e','$p','$ph','$r') ");
    }

    //Delete
    function deleteU($id)
    {
        $this->db->exec("delete from utilisateur where id='$id'");
    }

    // get utilisateur by id
    function getUtilisateurById($id){
        return $this->db->query("select * from utilisateur where id='$id'")->fetch();
    }

    //MAJ (utilisateur)
    function updateU($data){
        $n = $data['nom'];
        $pr = $data['prenom'];
        $e = $data['email'];
        $p = $data['password'];
        $ph = $data['phone'];
        $id = $data['idU'];
        $this->db->exec("update utilisateur set nom ='$n', prenom='$pr', email='$e', password='$p', phone='$ph' where id='$id'");
    }

    //MAJ (admin)
    function updateUA($data){
        $n = $data['nom'];
        $pr = $data['prenom'];
        $e = $data['email'];
        $p = $data['password'];
        $ph = $data['phone'];
        $r = $data['role'];
        $id = $data['idU'];
        $this->db->exec("update utilisateur set nom ='$n', prenom='$pr', email='$e', password='$p', phone='$ph', role='$r' where id='$id'");
    }
}