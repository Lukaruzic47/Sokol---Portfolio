function changeClass(){
    var vrijednost = document.getElementById("redTV").value;
    var size = 
    console.log("VRIJEDNOST JE: " + vrijednost);
    fetchData(vrijednost, size);
}

      /* -------------------- novo ------------------------ */
    function fetchData(stupac, velicina){
        /* kreiranje objekta za implementaciju asinkrone komunikacije sa serverom */
        var xhttp = new XMLHttpRequest();
        
        /* funkcija za rukovanje vraćenim podacima => vadi podatke iz XML-a te ih ugrađuje u sekciju u HTML-u stranice */
        /* podaci se mogu prikazati u bilo kojem formatu, ovdje se koristi lista stavki (<ul><li>...</li></ul>) */
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4  &&  this.status == 200){
            var imageCount;
            var xml = xhttp.responseXML;
            
            var count = xml.getElementsByTagName("count")

            imageCount = count[0].getElementsByTagName("broj")[0].innerHTML;
            
            document.getElementById("rbTV").max = imageCount; 
            document.getElementById("rbTV").placeholder = imageCount; 
            }
        };

        /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */
        xhttp.open("GET", "DBtestSiteSave.php?col=" + stupac + "&size=" + velicina, true);
        xhttp.send();
    }

      // na učitavanju stranice postavlja se sortiranje po imenu DLCa kao default
    document.addEventListener("DOMContentLoaded", function(){
          return fetchData(1, 4);
    });

      /* -------------------------------------------------- */