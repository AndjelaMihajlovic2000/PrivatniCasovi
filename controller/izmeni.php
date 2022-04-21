<?php
    require "../broker.php";
    require "../model/PrivatniCas.php";

    session_start();
    if(isset($_POST["id"])){
        $naziv=$_POST['naziv'];
        $opis= $_POST['opis'];
        $id= $_POST['id'];
        $nastavnik_id=$_SESSION['nastavnikID'];

        $result = $conn->query("UPDATE privatnicas SET naziv='$naziv', opis='$opis', predavac='$nastavnik_id' 
        WHERE privatnicasID='$id'");
        if($result) {
            echo "Success";
        } else {
            echo "Failed".$result;
        }        
    }
?>