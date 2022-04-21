<?php
    require "../broker.php";
    require "../model/PrivatniCas.php";

    if(isset($_POST["predavac"])){
        $naziv=$_POST['naziv'];
        $opis= $_POST['opis'];
        $id= $_POST['id'];

        $result = mysqli_query($conn, "UPDATE privatnicas SET naziv='$naziv', opis='$opis' WHERE privatnicasID='$id'");
        if($result) {
            echo "Success";
        } else {
            echo "Failed";
        }        
    }
?>