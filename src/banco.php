<?php
class Banco{
    private $db;

    public function __get($propriedade){
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor){
        $this->$propriedade = $valor;
    }

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=futfanatics","root","");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql){
        return $this->db->query($sql);
    }
    public function query_all($sql){
        return $this->db->query($sql)->fetchAll();
    }

    public function prepare($sql){
        return $this->db->prepare($sql);
    }

}
?>