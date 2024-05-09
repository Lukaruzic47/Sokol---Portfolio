var tablica, prefix;

function getData(data) {
    var inputs = document.querySelectorAll(
        "#redTV, #redDesk, #redTablet, #redTV2, #redDesk2, #redTablet2, #redMob2"
    );

    if (data.value == "boja") {
        tablica = "cimages";
        prefix = "CI";
        arg2 = prefix + "_Mobile_no";
        fetchData("redMob", arg2, "redMob")
    }
    if(data.value == "crno-bijelo"){
        tablica = "bwimages";
        prefix = "BW";
        arg2 = prefix + "_Mobile_no";
        fetchData("redMob", arg2, "redMob")
    }
    if(!data.value){
      inputs.forEach(element => {
        element.placeholder = "";
      });
    }
    console.log(tablica, prefix);

    inputs.forEach(element => {
      element.value = "";
    });
    
    if(data.value){
      inputs.forEach(element => {
        element.disabled = false;
      });
      
    }
    else{
      inputs.forEach(element => {
        element.disabled = true;
      });
    }
}

function changeData(Element) {
    var pulledID = Element.value;
    var size = [
        { htmlID: "redTV", DBcol: prefix + "_TV_Column" },
        { htmlID: "redDesk", DBcol: prefix + "_Desktop_Column" },
        { htmlID: "redTablet", DBcol: prefix + "_Tablet_Column" },
        { htmlID: "redMob", DBcol: prefix + "_Mobile_no" },
    ];

    var dbColValue;
    for (var i = 0; i < size.length; i++) {
        if (size[i].htmlID === Element.id) {
            dbColValue = size[i].DBcol;
            break;
        }
    }
    var idElementa = Element.id;
    console.log(pulledID, dbColValue, idElementa);

    fetchData(pulledID, dbColValue, idElementa);
}

/* -------------------- novo ------------------------ */
function fetchData(stupac, velicina, idElementa) {
  /* kreiranje objekta za implementaciju asinkrone komunikacije sa serverom */
  var xhttp = new XMLHttpRequest();
  
  /* funkcija za rukovanje vraćenim podacima => vadi podatke iz XML-a te ih ugrađuje u sekciju u HTML-u stranice */
  /* podaci se mogu prikazati u bilo kojem formatu, ovdje se koristi lista stavki (<ul><li>...</li></ul>) */
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var imageCount;
      var xml = xhttp.responseXML;
      
      var count = xml.getElementsByTagName("count");

            imageCount = count[0].getElementsByTagName("broj")[0].innerHTML;
            console.log("image count:" + imageCount);
            document.getElementById(idElementa + "2").max = ++imageCount;
            document.getElementById(idElementa + "2").placeholder = imageCount;
        }
    };

    if (velicina === prefix + "_Mobile_no") {
        stupac = prefix + "_Mobile_no";
    }

    /* definicija parametara zahtjeva te slanje zahtjeva za podacima => sa zahtjevom se šalje ID odabranog žanra */
    console.log(velicina, stupac, tablica);
    xhttp.open("GET", "AddAjax.php?col=" + stupac + "&size=" + velicina + "&table=" + tablica, true);
    xhttp.send();
}
