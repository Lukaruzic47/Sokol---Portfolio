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

    function brisi(id){
        var pitanje = confirm("Želite li trajno obrisati odabranu fotografiju i njene komentare?");
        if(pitanje){
            location.href="brisi-fotografiju.php?id=" + id;
        }
    }

      /* -------------------- novo ------------------------ */
    function fetchData(orderBy, upDown){
        console.log(orderBy,upDown);
        /* kreiranje objekta za implementaciju asinkrone komunikacije sa serverom */
        var xhttp = new XMLHttpRequest();
        
        /* funkcija za rukovanje vraćenim podacima => vadi podatke iz XML-a te ih ugrađuje u sekciju u HTML-u stranice */
        /* podaci se mogu prikazati u bilo kojem formatu, ovdje se koristi lista stavki (<ul><li>...</li></ul>) */
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4  &&  this.status == 200){
            var podaci = "", Tech_icon, Tech_name, Tech_id, Tech_effect, Tech_desc, Tech_cost, Tech_rarity, Tech_dlc, Tech_category_name, Tech_category_icon, Tech_dlc_icon;
            var xml = xhttp.responseXML;
            var TechKolekcija = xml.getElementsByTagName("Technology");
            for (let i = 0; i < TechKolekcija.length; i++) {
                Tech_icon = TechKolekcija[i].getElementsByTagName("ikonaTehnologije")[0].innerHTML;
                Tech_name = TechKolekcija[i].getElementsByTagName("nazivTehnologije")[0].innerHTML;
                Tech_id = TechKolekcija[i].getElementsByTagName("IdTehnologije")[0].innerHTML;
                Tech_effect = TechKolekcija[i].getElementsByTagName("efektTehnologije")[0].innerHTML;
                Tech_desc = TechKolekcija[i].getElementsByTagName("opisTehnologije")[0].innerHTML;
                Tech_cost = TechKolekcija[i].getElementsByTagName("cijenaTehnologije")[0].innerHTML;
                Tech_rarity = TechKolekcija[i].getElementsByTagName("rarity")[0].innerHTML;
                Tech_dlc = TechKolekcija[i].getElementsByTagName("DlcTehnologije")[0].innerHTML;
                Tech_category_name = TechKolekcija[i].getElementsByTagName("categoryName")[0].innerHTML;
                Tech_category_icon = TechKolekcija[i].getElementsByTagName("ikonaKategorije")[0].innerHTML;
                Tech_dlc_icon = TechKolekcija[i].getElementsByTagName("ikonaDLCa")[0].innerHTML;
                podaci += "<tr><td><img src='" + Tech_icon + "'/></td><td><p class='td-text'>" + Tech_name + "</p></td><td><img src='" + Tech_category_icon + "'/><br><p class='td-text'>" + Tech_category_name + "</p></td><td><p class='td-text'>" + Tech_desc + "</p></td><td><p class='td-text'>" + Tech_effect + "</p></td><td><p class='td-text'>" + Tech_cost + "</p></td><td><p class='td-text'>" + Tech_rarity + "</p></td><td><img src='" + Tech_dlc_icon + "' /><br><p class='td-text'>" + Tech_dlc + "</p></td></tr>";
            }
            /* ugradnja dohvaćenih podataka u HTML stablo */
            document.getElementById("dataTech").innerHTML = podaci; 
            }
        };

        /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */
        xhttp.open("GET", "OrderByTech.php?orderby=" + orderBy + "&updown=" + upDown, true);
        xhttp.send();
    }

      // na učitavanju stranice postavlja se sortiranje po imenu DLCa kao default
      document.addEventListener("DOMContentLoaded", function(){
          return fetchData("tech_name", "asc");
      });

      /* -------------------------------------------------- */