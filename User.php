<?php
#Class Users
Class Users{
# Private attibute of the class Users
    private $username;
    private $email;
    private $password;
# Fonction construct
    public function __Construct($_username,$_email,$_password)
    {
      #  $this->id = $_id;
        $this->username = $_username;
        $this->email = $_email;
        $this->password = $_password;
    }

    # ------- Les fonctions Getters ---------
  /*  function get_id(){
        return $this->id;
    }

    */
    function get_username(){
        return $this->username;
    }
    function get_email(){
        return $this->email;
    }
    function get_password(){
        return $this->password;
    }
    # ------- Les fonctions Setters ----------
    function set_user($_id){
        $this->id = $_id;
    }
    function set_username($_username){
        $this->username = $_username;
    }
    function set_email($_email){
        $this->email = $_email;
    }
    function set_password($_password){
        $this->email = $_password;
    }
}
# Test d'instantiation
#$user = new Users("sandra","@gmail.com","kely");
#echo $user->get_username();

?>