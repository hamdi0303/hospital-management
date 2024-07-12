<?php

class Message
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
    }
    function listeMessages()
    {
        return $this->db->query("select * from message");
    }

    //ajout de message
    function addMes($data){//$_GET, $_POST
        $n = $data['nom'];
        $idp = $data['idp'];
        $c = $data['contenu'];
        $d = $data['dateenvoi'];
        $this->db->exec("insert into message values ('','$n','$idp','$c','$d') ");
    }

    function deleteMes($id)
    {
        $this->db->exec("delete from message where id='$id'");
    }

    function getMessageById($id){
        return $this->db->query("select * from message where id='$id'")->fetch();
    }
}