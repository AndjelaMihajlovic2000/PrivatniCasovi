<?php
 require "broker.php";
 require "model/PrivatniCas.php";
 require "model/Nastavnik.php";
session_start();

if(!isset($_SESSION['nastavnikID'])){
    header("Location: login.php");
    exit();
}
$svi= PrivatniCas :: prikaziSveCasove($conn);

if(!$svi){
    echo "Doslo je do greške.";
    exit();
}

if($svi->num_rows == 0){
    
    echo  "<script> alert('Nema registrovanih časova!') </script>";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Dnevnik casova</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <div class="padding-container">
        <h1>Škola NAPREDAK
            <br>
             Dnevnik za evidenciju časova.</h1>
        <p>Dragi nastavnici, dobrodošli na vaš on-line evidenciju časova.
            Srećno sa radom!
        </p>
        <div style="display: flex; align-items:center">
            <button style="margin-right:20px; margin-bottom:30px; padding:0px; width:100px; height:40px" type="button" id="novi-cas" class="btn btn-success">Novi čas</button>
            <button style="margin-right:20px; margin-bottom:30px; padding:0px; width:40px; height:40px" type="button" class="btn btn-info" id="sortiraj"><i class="fas fa-sort"></i></button>
            <input style="margin-right:20px; width:200px; display:inline; margin-bottom:30px" type="text" class="form-control" id="search" placeholder="Pretražite časove...">
            <a href="logout.php"> Izloguj se!</a>

        </div>
    </div>
    <div class="prozor-cas">
        <form id="dodajNoviCas">
            <div class="form-group">
                <label>Naziv časa</label>
                <input name="naziv" type="text" class="form-control" placeholder="Unesite naziv časa...">
            </div>
            <div class="form-group">
                <label>Opis datog časa kao i dodatne informacije</label>
                <input name="opis" type="text" class="form-control" placeholder="Unesite potrebne informacije...">
            </div>
            <button id="btnDodajCas"  type="submit" class="btn btn-primary">Dodaj novi</button>
        </form>
    </div>

    <div class="izmeni-cas">
        <form id="izmeniCas">
            <div class="form-group">
                <label>Identifikacioni broj časa</label>
                <input name="id" id="id-input" type="text" disabled class="form-control">
            </div>
            <div class="form-group">
                <label>Naziv privatnog časa</label>
                <input name="naziv" id="naziv-input" type= "text" class="form-control" placeholder="Unesite naziv privatnog časa..">
            </div>
            <div class="form-contol">
                <label> Kratak pregled informacija o času </label>
                <textarea name="opis" id="opis-input" type="text" class="form-control" placeholder="Unesite neophodne informacije..."></textarea>
            </div>
            <div class="form-control">
                <label>Predavac</label>
                <input name="predavac" id="predavac-input" displayed type="text" class="form-control">
            </div>
            <button id="btnIzmeni" type="submit" class="btn btn-warning">Izmeni</button>
        </form>
    </div>
    <div class="padding-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> Identifikacioni broj privatnog časa</th>
                    <th scope="col"> Naziv časa</th>
                    <th scope="col"> Kratak opis i dodatne informacije o času</th>
                    <th scope="col"> Naziv predavača</th>
                    <th scope="col">Opcije</th>
                </tr>
            </thead>
            <tbody class="telo">
                <?php
                    while ($row=$svi->fetch_array()):
                ?>
                <tr id="<?php echo $row["privatnicasID"]?>">
                    <td scope="row"><?php echo $row["privatnicasID"]?></td>
                    <td data-target="naziv"><?php echo $row["naziv"]?></td>
                    <td data-target="opis"><?php echo $row["opis"]?></td>
                    <?php 
                    $nastavnik = Nastavnik::pronadjiNastavnikaID($conn,$row["predavac"])->fetch_assoc();
                    
                    ?>
                    <td data-target="predavac"><?=$nastavnik['username']?></td>
                    <td>
                        <a href="#" style="margin-right:10px;"class="btn btn-warning btn-sm izmeni-cas-button" data-id="<?php echo $row['privatnicasID']; ?>"><i class="fas fa-pen"></i></a>
                        <a href="#" class="btn btn-danger btn-sm obrisi-cas-button" data-id="<?php echo $row['privatnicasID']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
            </table>
    </div>
    <script src="script.js"></script>

</body>
</html>

