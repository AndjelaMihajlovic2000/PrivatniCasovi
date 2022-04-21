//nova forma

$('#novi-cas').click(function(e){
    e.preventDefault();

    $(".prozor-cas").toggleClass("hidden-cas");
});

// obrada dodavanja novog kursa

$('#dodajNoviCas').submit(function(e)
{
    e.preventDefault();
    console.log("Dodavaje");
    const $form=$(this);
    const $input=$form.find('input,textarea,button,select');
    const podaci = $form.serialize();
    console.log(podaci)
    $input.prop('disabled',true);

    let request = $.ajax({
        url: 'controller/dodaj.php',
        type: 'POST',
        data: podaci
    });

    request.done(function(response){
    

        if(response === 'Success'){
            alert("Novi čas je uspešno dodat.");
            location.reload(true);
        }
        else{
            console.log("Novi čas nije dodat."+response);
        }
    });
    request.fail(function(){
        console.error("Desila se greska.");
    });
});
// obrada brisanje postojeceg casa

$(".obrisi-cas-button").click(function(e){
    e.preventDefault();
    let kljuc=$(this).data('id');
    let td = $("#" + kljuc).closest('tr');

    let request =$.ajax({
        url:'controller/izbrisi.php',
        type:'post',
        data: {
            id:kljuc
        }
    });

    request.done(function(response){
        if(response === 'Success'){
            td.remove();
            alert("Čas je obrisan.");
            location.reload(true);
        }else{
            console.log("Čas nije obrisan.")
        }
    });
});
// prikazivanje forme za izmenu kursa

$(".izmeni-cas-button").click(function(){
    $(".izmeni-cas").toggleClass("hidden-cas");

    let id = $(this).data('id');
    let naziv =$("#" + id).children("td[data-target=naziv]").text();
    let opis = $("#" + id).children("td[data-target=opis]").text();
    let predavac = $("#" + id).children("td[data-target=predavac]").text();

    console.log(id);
    $("#id-input").val(id);
    $("#naziv-input").val(naziv);
    $("#opis-input").val(opis);
    $("#predavac-input").val(predavac);
});

//update f-ja

$("#izmeniCas").submit(function(e){
    e.preventDefault();
    
    const $form=$(this);
    const $input=$form.find('input, textarea');
    let podaci = $form.serialize();
    let idPredmeta = $('#id-input').val();
    console.log(idPredmeta)
    podaci+=`&id=${idPredmeta}`;
    console.log(podaci)



    let request = $.ajax({
        url: 'controller/izmeni.php',
        type: 'post',
        data: podaci
    });
    request.done(function(response){
        console.log(response);
        if(response === 'Success'){
            alert("Cas je izmenjen");
            location.reload(true);
        }
        else{
            alert("Cas nije izmenjen!");
            console.log(response);
        }
    });
    request.fail(function(){
        console.error("Desila se greska.");
    });
    

});

// pretrazivanje kurseva

$("#search").on('keyup',function(){
    let kriterijum = $(this).val().toLowerCase();

    $("table tr").each(function(i){
        if(i!=0){
            let red= $(this);
            if(red.text().toLowerCase().indexOf(kriterijum)<=-1){
                red.hide();
            }
            else{
                red.show();
            }
        }
    });
});

//sortiranje tabele

function sortiraj() {
    let tabela = document.querySelector(".table");
    let redovi = tabela.rows;

    console.log("Pokrenuta funkcija za sortiranje."); // provera

    let menjaj = true;
    let promena;
    let x, y, i;
    let brojac = 0;
    let redosled = "asc";
    while (menjaj) {
        menjaj = false;
        for (i = 1; i < (redovi.length - 1); i++) {
            promena = false;
            x = redovi[i].getElementsByTagName("td")[1];
            y = redovi[i + 1].getElementsByTagName("td")[1];
            if (redosled == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    promena = true;
                    break;
                }
            } else if (redosled == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    promena = true;
                    break;
                }
            }
        }
        if (promena) {
            redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
            menjaj = true;
            brojac++;
        } else {
            if (brojac == 0 && redosled == "asc") {
                redosled = "desc";
                menjaj = true;
            }
        }
    }
}

$("#sortiraj").click(function (e) {
    e.preventDefault();
    sortiraj();
});