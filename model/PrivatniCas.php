<?php

class PrivatniCas{

    public $id;
    public $naziv;
    public $opis;
    public $predavac;


    public function __construct($id=null,$naziv=null,$opis=null,$predavac=null){
        $this->id=$id;
        $this->naziv=$naziv;
        $this->opis=$opis;
        $this->predavac=$predavac;

    }

    public static function prikaziSveCasove($conn){
        $sql="SELECT * FROM privatnicas";
        return $conn->query($sql);
    }

    public static function pronadjiID($id,$conn){
        $sql="SELECT * FROM privatnicas WHERE privatnicasID=$id";
        $myObj= array();
        if($rez = $conn->query($sql)){
            while($row= $rez->fetch_array(1)){
                $myObj[]=$row;
            }
        }
        return $myObj;
    }
    public function izbrisiID($conn){
        $sql="DELETE FROM privatnicas WHERE privatnicasID= $this->id ";
        return $conn-> query($sql);
    }
    public static function dodaj($novicas,$conn){
        $sql="INSERT INTO privatnicas (naziv,opis,predavac) VALUES ('$novicas->naziv','$novicas->opis','$novicas->predavac')";
        return $conn->query($sql);
    }

    



}
?>