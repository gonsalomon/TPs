<?php

class AuthModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    function addUser($user,$pass)
    {
        $sentencia = $this->db->prepare("INSERT INTO users(mail, pass) VALUES(?, ?)");
        $sentencia->execute(array($user, $pass));
        echo "Usuario registrado correctamente";
        header("Location: home");
    }

    function getUser($user)
    {
        $sentencia = $this->db->prepare("SELECT * FROM users WHERE mail=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}