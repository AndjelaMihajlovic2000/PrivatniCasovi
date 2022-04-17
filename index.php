<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Dnevnik casova</title>
</head>
<body>
    
    <div class="panding-container">
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
        </div>
    </div>
    <div class="prozor-za-cas">
        <form action="#" method="POST" id="dodajNoviCas">
            <div class="form-group">
                <label>Naziv časa</label>
                <input name="naziv" type="text" class="form-control" placeholder="Unesite naziv časa...">
            </div>
            <div class="form-group">
                <label>Opis datog časa kao i dodatne informacije</label>
                <input name="naziv" type="text" class="form-control" placeholder="Unesite potrebne informacije...">
            </div>
            <button id="btnDodajCas" formmethod="POST" type="submit" class="btn btn-primary">Dodaj novi</button>
        </form>



    </div>



</body>
</html>