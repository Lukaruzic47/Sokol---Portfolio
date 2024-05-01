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
        console.log(orderBy,upDown);
        /* kreiranje objekta za implementaciju asinkrone komunikacije sa serverom */
        var xhttp = new XMLHttpRequest();
        
        /* funkcija za rukovanje vraćenim podacima => vadi podatke iz XML-a te ih ugrađuje u sekciju u HTML-u stranice */
        /* podaci se mogu prikazati u bilo kojem formatu, ovdje se koristi lista stavki (<ul><li>...</li></ul>) */
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4  &&  this.status == 200){
            var podaci = "", Origin_icon, Origin_name, Origin_effect, OriginRequ, OriginDlc, OriginId, OriginDlcImg;
            var xml = xhttp.responseXML;
            var OriginKolekcija = xml.getElementsByTagName("Origin");
            for (let i = 0; i < OriginKolekcija.length; i++) {
                Origin_icon = OriginKolekcija[i].getElementsByTagName("ikonaOrigin")[0].innerHTML;
                Origin_name = OriginKolekcija[i].getElementsByTagName("nazivOrigin")[0].innerHTML;
                Origin_effect = OriginKolekcija[i].getElementsByTagName("effectOrigin")[0].innerHTML;
                OriginRequ = OriginKolekcija[i].getElementsByTagName("requOrigin")[0].innerHTML;
                OriginDlc = OriginKolekcija[i].getElementsByTagName("dlcOrigin")[0].innerHTML;
                OriginId = OriginKolekcija[i].getElementsByTagName("IDOrigin")[0].innerHTML;
                OriginDlcImg = OriginKolekcija[i].getElementsByTagName("DlcImg")[0].innerHTML;
                podaci += "<tr><td><img src='" + Origin_icon + "' /></td><td><p class='td-text'>" + Origin_name + "</p></td><td><p class='td-text'>" + Origin_effect + "</p></td><td><p class='td-text'>" + OriginRequ + "</p></td><td><img src='" + OriginDlcImg +"' /><br><p class='td-text'>" + OriginDlc + "</p></td><td><a class='btn ad-tool-btn btn-action' href='EditOrigin.php?id=" + OriginId +"' role='button'>Edit</a><a class='btn ad-tool-btn btn-action' href='DeleteOrigin.php?id=" + OriginId + "'  role='button'>Delete</a></td></tr>";
            }
            /* ugradnja dohvaćenih podataka u HTML stablo */
            document.getElementById("dataOrigin").innerHTML = podaci; 
            }
        };

        /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */
        xhttp.open("GET", "OrderByOrigin.php?orderby=" + orderBy + "&updown=" + upDown, true);
        xhttp.send();
      }

      // na učitavanju stranice postavlja se sortiranje po imenu DLCa kao default
      document.addEventListener("DOMContentLoaded", function(){
          return fetchData("origin_name", "asc");
      }); 
    

      /* -------------------------------------------------- */