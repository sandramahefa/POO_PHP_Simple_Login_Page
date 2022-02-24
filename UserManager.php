<?php
require "Connexion.php";
require "User.php";
$db_pdo = Connexion::getconnexionPDO();
#var_dump($db);
Class UserManager{
    private $db;
    #fonction contruct UserManager
    public function __contruct(PDO $db){
        $this->db = $db;
    }
    #function get_db 
    public function get_db(){
        return $this->db;
    }
    #fonction set_db pour la connexion au base de donnée 
    public function set_db(PDO $db){
        $this->db = $db;
    }

    #fonction pour consulter tous les utilisateurs dans la BDD
    public function getAll_users(){
        $users = array();
        $result = $this->db->query('SELECT * FROM users');
        if($result !== false){
            while($données = $result->fetch(PDO::FETCH_ASSOC)){
                $users [] = new Users($données['id'],$données['username'],$données['email'],$données['password']);
            }    
        }
        return $users;
    }

    #Selectionner un User par son $username
    public function getUserByName($username){
        $result = $this->db->prepare('SELECT * FROM users WHERE username=:username');
        $result->bindValue(':username',$username);
        $result->execute();
        $donnee = $result->fetch(PDO::FETCH_ASSOC);
        $user = new Users($donnee['username'],$donnee['email'],$donnee['password']);
        
        return $user;
    }
    public function getUserByEmail($email){
        $result = $this->db->prepare('SELECT * FROM users WHERE email=:email');
        $result->bindValue(':email',$email);
        $result->execute();
        $donnee = $result->fetch(PDO::FETCH_ASSOC);
        $user = new Users($donnee['username'],$donnee['email'],$donnee['password']);
        
        return $user;
    }
    # Ajouter un User
    public function addUser(Users $user){
        $sql = $this->db->prepare("INSERT into users SET username=:username, email=:email, password=:password");
        $sql->bindValue(':username', $user->get_username());
        $sql->bindValue(':email', $user->get_email());
        $sql->bindValue(':password', $user->get_password());
        $sql->execute();
    }
    #Effacer un user
    public function deleteUser($username){
        $query = $this->db->prepare('DELETE FROM users WHERE username=:username');
        $query->bindValue(':username', $username);
        $query->execute();
    }

}

?>