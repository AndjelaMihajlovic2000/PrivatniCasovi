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




}









?>