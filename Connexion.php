<?php
#class connaxionPDO pour connecter au base de dennée avec PDO et MYSQLI
Class Connexion
{
    #CONNEXION AVEC pdo
    static function getconnexionPDO(){
        $db = new PDO('mysql:host=localhost;dbname=Login','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
     #CONNEXION AVEC mysql
    static function getconnexionMYSQLI(){
        return new MySQLI('localhost','root','login_register_pure_coding');
    }

}
?>