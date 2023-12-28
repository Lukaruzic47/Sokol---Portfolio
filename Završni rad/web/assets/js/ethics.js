var a = 0;
var def = "sort4";
var oldID = "sort1";

function changeEthicClass(btn){
    where = (btn.id);
    
    sort = "sort" + where;
    if(oldID == sort && a == 0){
        document.getElementById(sort).className = "fa-solid fa-sort-down";
        a++;
        oldID = sort;
        fetchEthicData(document.getElementById(sort).dataset.sort, "asc");
    }
    else if(oldID == sort && a == 1){
        document.getElementById(sort).className = "fa-solid fa-sort-up";
        a++;
        oldID = sort;
        fetchEthicData(document.getElementById(sort).dataset.sort, "desc");
    }
    else if(oldID == sort && a == 2){
        document.getElementById(sort).className = "fa-solid fa-sort";
        a++;
        oldID = sort;
        fetchEthicData(document.getElementById(def).dataset.sort, "asc");
    }
    else if(oldID == sort && a == 3){
        a = 0;
        document.getElementById(sort).className = "fa-solid fa-sort-down";
        a++;
        oldID = sort;
        fetchEthicData(document.getElementById(sort).dataset.sort, "asc");
    }
    else if(oldID != sort){
        document.getElementById(oldID).className = "fa-solid fa-sort";
        oldID = sort;
        a = 1;
        document.getElementById(sort).className = "fa-solid fa-sort-down";
        fetchEthicData(document.getElementById(sort).dataset.sort, "asc");
    }
}

      /* -------------------- novo ------------------------ */
      function fetchEthicData(orderBy, upDown){
        console.log(orderBy,upDown);
        /* kreiranje objekta za implementaciju asinkrone komunikacije sa serverom */
        var xhttp = new XMLHttpRequest();
        
        /* funkcija za rukovanje vraćenim podacima => vadi podatke iz XML-a te ih ugrađuje u sekciju u HTML-u stranice */
        /* podaci se mogu prikazati u bilo kojem formatu, ovdje se koristi lista stavki (<ul><li>...</li></ul>) */
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4  &&  this.status == 200){
            var podaci = "", Ethic_icon, Ethic_name, Ethic_effect, Ethic_desc, Ethic_opposite, Ethic_id;
            var xml = xhttp.responseXML;
            var EthicKolekcija = xml.getElementsByTagName("Ethic");
            for (let i = 0; i < EthicKolekcija.length; i++) {
                Ethic_icon = EthicKolekcija[i].getElementsByTagName("ikonaEthic")[0].innerHTML;
                Ethic_name = EthicKolekcija[i].getElementsByTagName("nazivEthic")[0].innerHTML;
                Ethic_effect = EthicKolekcija[i].getElementsByTagName("effectEthic")[0].innerHTML;
                Ethic_id = EthicKolekcija[i].getElementsByTagName("IDEthic")[0].innerHTML;
                Ethic_desc = EthicKolekcija[i].getElementsByTagName("descEthic")[0].innerHTML;
                Ethic_opposite = EthicKolekcija[i].getElementsByTagName("ethicOpposite")[0].innerHTML;
                podaci += "<tr><td><img src='" + Ethic_icon + "' /></td><td><p class='td-text'>" + Ethic_name + "</p></td><td><p class='td-text'>" + Ethic_effect + "</p></td><td><p class='td-text'>" + Ethic_desc + "</p></td><td><p class='td-text'>" + Ethic_opposite + "</p></td></tr>";
            }
            /* ugradnja dohvaćenih podataka u HTML stablo */
            document.getElementById("dataEthic").innerHTML = podaci; 
            }
        };

        /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */
        xhttp.open("GET", "OrderByEthic.php?orderby=" + orderBy + "&updown=" + upDown, true);
        xhttp.send();
      }

      // na učitavanju stranice postavlja se sortiranje po imenu DLCa kao default
      document.addEventListener("DOMContentLoaded", function(){
          return fetchEthicData("ethic_name", "asc");
      });

      /* -------------------------------------------------- */