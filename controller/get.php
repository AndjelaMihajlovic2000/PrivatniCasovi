<?php

    require "../broker.php";

    require "../model/PrivatniCas.php";

    if(isset($_POST["id"])){
        $niz= PrivatniCas :: pronadjiID($_POST["id"],$conn);
        echo json_encode($niz);
    }

?>