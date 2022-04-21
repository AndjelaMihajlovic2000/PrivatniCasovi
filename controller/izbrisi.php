<?php


require_once "../broker.php";
require_once "../model/PrivatniCas.php";

if(isset($_POST["id"])){
    $cas= new PrivatniCas($_POST["id"]);
    $status = $cas->izbrisiID($conn);
    if($status){
        echo "Success";
    }else {
        echo "Failed";
    }

}




?>