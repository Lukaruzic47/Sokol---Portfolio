var a = 0;
var def = "sort0";
var oldID = "sort1";

function changeClass(btn){
    where = (btn.id);
    
    sort = "sort" + where;
    if(oldID == sort && a == 0){
        document.getElementById(sort).className = "fa-solid fa-sort-down";
        a++;
        oldID = sort;
        fetchData(document.getElementById(sort).dataset.sort, "asc");
    }
    else if(oldID == sort && a == 1){
        document.getElementById(sort).className = "fa-solid fa-sort-up";
        a++;
        oldID = sort;
        fetchData(document.getElementById(sort).dataset.sort, "desc");
    }
    else if(oldID == sort && a == 2){
        document.getElementById(sort).className = "fa-solid fa-sort";
        a++;
        oldID = sort;
        fetchData(document.getElementById(def).dataset.sort, "asc");
    }
    else if(oldID == sort && a == 3){
        a = 0;
        document.getElementById(sort).className = "fa-solid fa-sort-down";
        a++;
        oldID = sort;
        fetchData(document.getElementById(sort).dataset.sort, "asc");
    }
    else if(oldID != sort){
        document.getElementById(oldID).className = "fa-solid fa-sort";
        oldID = sort;
        a = 1;
        document.getElementById(sort).className = "fa-solid fa-sort-down";
        fetchData(document.getElementById(sort).dataset.sort, "asc");
    }
}

      /* -------------------- novo ------------------------ */
      function fetchData(orderBy, upDown){
        /* kreiranje objekta za implementaciju asinkrone komunikacije sa serverom */
        var xhttp = new XMLHttpRequest();
        
        /* funkcija za rukovanje vraćenim podacima => vadi podatke iz XML-a te ih ugrađuje u sekciju u HTML-u stranice */
        /* podaci se mogu prikazati u bilo kojem formatu, ovdje se koristi lista stavki (<ul><li>...</li></ul>) */
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4  &&  this.status == 200){
            var podaci = "", DLC_name, DLC_release_date, DLC_type, DLC_ikona;
            var xml = xhttp.responseXML;
            var dlcKolekcija = xml.getElementsByTagName("DLC");
            for (let i = 0; i < dlcKolekcija.length; i++) {
                DLC_ikona = dlcKolekcija[i].getElementsByTagName("ikonaDLCa")[0].innerHTML;
                DLC_name = dlcKolekcija[i].getElementsByTagName("nazivDLCa")[0].innerHTML;
                DLC_release_date = dlcKolekcija[i].getElementsByTagName("GodinaDLCa")[0].innerHTML;
                DLC_id = dlcKolekcija[i].getElementsByTagName("DLCID")[0].innerHTML;
                DLC_type = dlcKolekcija[i].getElementsByTagName("TipDLCa")[0].innerHTML;
                podaci += "<tr><td><img src='" + DLC_ikona + "' /></td><td><p class='td-text'>" + DLC_name + "</p></td><td><p class='td-text'>" + DLC_release_date + "</p></td><td><p class='td-text'>" + DLC_type + "</p><td><a class='btn ad-tool-btn btn-action' href='EditExpansions.php?id=" + DLC_id + "' role='button'>Edit</a><a class='btn ad-tool-btn btn-action' href='DeleteDLC.php?id=" + DLC_id + "' role='button'>Delete</a></td></tr>";
            }
            /* ugradnja dohvaćenih podataka u HTML stablo */
            document.getElementById("data").innerHTML = podaci; 
            }
        };

        /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */
        xhttp.open("GET", "OrderBy.php?orderby=" + orderBy + "&updown=" + upDown, true);
        xhttp.send();
      }

      // na učitavanju stranice postavlja se sortiranje po imenu DLCa kao default
      document.addEventListener("DOMContentLoaded", function(){
          return fetchData("DLC_name", "asc");
      });

      /* -------------------------------------------------- */