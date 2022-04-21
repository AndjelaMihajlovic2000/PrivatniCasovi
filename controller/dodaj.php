<?php

require "../broker.php";
require "../model/PrivatniCas.php";

session_start();
if(isset($_POST["naziv"]) && isset($_POST["opis"])){

    $novi= new PrivatniCas (null, $_POST["naziv"],$_POST["opis"],$_SESSION['nastavnikID']);
    $status = PrivatniCas :: dodaj($novi,$conn);
    if($status){
        echo "Success";
    }
    else{
        echo $status."Failed";
    }



}



?>