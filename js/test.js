var tablica = document.getElementById("").value;

function enableFirstSelect(selectedElementId, firstSelect) {
  const firstSelect = document.getElementById("redTV");
  if (document.getElementById(selectedElementId).value) {
    firstSelect.disabled = false;
  } else {
    firstSelect.disabled = true;
  }
}

function changeData(Element){
  var pulledID = Element.value;
    var size = [
      {htmlID: "redTV", DBcol: "CI_TV_Column"},
      {htmlID: "redDesk", DBcol: "CI_Desktop_Column"},
      {htmlID: "redTablet", DBcol: "CI_Tablet_Column"},
      {htmlID: "redMob", DBcol: "CI_Mobile_no"},
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

        if(velicina === "CI_Mobile_no"){
          stupac = "CI_Mobile_no";
        }

        /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */
        var postContent = "col=" + encodeURIComponent(stupac) + "&orderBy=" + encodeURIComponent(velicina) + ""

        xhttp.open("GET", "DBtestSiteSave.php?col=" + stupac + "&size=" + velicina + "&table=", true);
        xhttp.send();
    }