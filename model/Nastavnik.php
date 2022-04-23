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

    public function loginNastavnik($conn){
        $sql="SELECT * FROM nastavnik WHERE username='$this->username' and password='$this->password'";
        $result=$conn->query($sql);  
        return $result;
    }

    public static function pronadjiNastavnikaID($conn,$nastavnik_id){

        $query = "SELECT * FROM nastavnik WHERE nastavnikId=$nastavnik_id";
        $result = $conn->query($query);
        return $result;
    }
}




?>