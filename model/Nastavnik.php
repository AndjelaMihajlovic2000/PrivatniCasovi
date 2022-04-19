<?php 

class Nastavnik{

    public $id;
    public $usename;
    public $password;

    public function __construct($id=null, $username=null, $password=null){

        $this->id=$id;
        $this->usename=$username;
        $this->password= $password;
    }

    public static function loginNastavnik($nast,$conn){
        $sql="SELECT * FROM nastavnik WHERE username='$nast->username' and password='$nast->password'";
        return $conn->query($sql);
    }








}




?>