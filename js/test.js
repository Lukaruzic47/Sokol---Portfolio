var tablica, prefix;

function getData(){
  tablica = document.getElementById("type").value;
  if(tablica){
    if(tablica == "boja"){
      tablica = "cimages";
      prefix = "CI";
    }
    else{
      tablica = "bwimages";
      prefix = "BW";
    }
  }
}

function changeData(Element){
  var pulledID = Element.value;
    var size = [
      {htmlID: "redTV", DBcol: prefix + "_TV_Column"},
      {htmlID: "redDesk", DBcol: prefix + "_Desktop_Column"},
      {htmlID: "redTablet", DBcol: prefix + "_Tablet_Column"},
      {htmlID: "redMob", DBcol: prefix + "_Mobile_no"},
    ] 

    var dbColValue;
    for (var i = 0; i < size.length; i++) {
        if (size[i].htmlID === Element.id) {
            dbColValue = size[i].DBcol;
            break;
        }
    }
    var idElementa = Element.id;

    fetchData(pulledID, dbColValue, idElementa);
}

      /* -------------------- novo ------------------------ */
    function fetchData(stupac, velicina, idElementa){
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
            
            document.getElementById(idElementa + "2").max = ++imageCount; 
            document.getElementById(idElementa + "2").placeholder = imageCount; 
            }
        };

        if(velicina === prefix + "_Mobile_no"){
          stupac = prefix + "_Mobile_no";
        }

        /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */

        xhttp.open("GET", "DBtestSiteSave.php?col=" + stupac + "&size=" + velicina + "&table=" + tablica, true);
        xhttp.send();
    }