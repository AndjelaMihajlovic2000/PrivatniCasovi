<?php

    require "broker.php";
    require "model/Nastavnik.php";

    session_start();
    if(isset($_POST["username"])&& isset($_POST["password"])){
        
        $user=$_POST["username"];
        $pass=$_POST["password"];
        $nast = new Nastavnik(1,$user,$pass);

        $odg= Nastavnik::loginNastavnik($nast,$conn);
        
        if($odg->num_rows == 1){
            
            //echo "postoji";
            $row = $odg->fetch_row();
            $_SESSION['nastavikId'] = $row[0];
            header("Location: index.php");
            exit();
            

        }
        else{
           // echo "ne postoji"; 
           echo  "<script> alert('Pogresno korisničko ime ili lozinka') </script>";
           header("Location: login.php");
        }




    }





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Dnevnik casova/Login</title>
</head>
<body>
<div>
        <h1>Škola privatnih časova
            <br>
            <br>   
            Dobrodošli!
        </h1>
        <h3>Molimo unesite Vaše korisničko ime i Vašu lozinku<h3>
    </div>

    <form method="POST" action="">
        <div class="form-group">
            <label>Korisničko ime</label>
            <input type="text" name="username" class="form-control" placeholder="Korisničko ime" required>
        </div>
        <div class="form-group">
            <label>Lozinka</label>
            <input type="password" name="password" class="form-control" placeholder="Lozinka" required>
        </div>
        <button type="submit" class="btn btn-primary">Uloguj se!</button>
    </form>
</body>
</html>