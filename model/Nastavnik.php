<?php 

class Nastavnik{

    public $id;
    public $username;
    public $password;

    public function __construct($id=null, $username=null, $password=null){

        $this->id=$id;
        $this->username=$username;
        $this->password= $password;
    }

    public static function loginNastavnik($nast,$conn){
        $sql="SELECT * FROM nastavnik WHERE username='$nast->username' and password='$nast->password'";
        return $conn->query($sql);
    }








}




?>