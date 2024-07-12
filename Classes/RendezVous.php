<?php

class RendezVous
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
    }

    //La liste des RDV (Admin)
    function listeRDV()
    {
        return $this->db->query("select * from rendezvous");
    }

    //La liste des RDV (utilisateur)
    function listeRDVu($id)
    {
        return $this->db->query("select * from rendezvous where idp='$id'");
    }

    //ajout RDV(inscription)
    function addRDV($data){//$_GET, $_POST
        $idp = $data['idp'];
        $idm = $data['idm'];
        $d = $data['date'];
        $h = $data['horraire'];
        $this->db->exec("insert into rendezvous values ('','$idp','$idm','$d','$h') ");
    }

    //Delete
    function deleteRDV($id)
    {
        $this->db->exec("delete from rendezvous where id='$id'");
    }

    // get RDV by id
    function getRDVById($id){
        return $this->db->query("select * from rendezvous where id='$id'")->fetch();
    }

    //MAJ (utilisateur)
    function updateRDV($data){
        $idp = $data['idp'];
        $idm = $data['idm'];
        $d = $data['date'];
        $h = $data['horraire'];
        $id = $data['idR'];
        $this->db->exec("update rendezvous set idp ='$idp', idm='$idm', date='$d', horraire='$h' where id='$id'");
    }
}