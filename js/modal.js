// Objekt za praćenje stanja svakog moda
var modalStates = {};

function toggleModal(ID) {
    var modal = document.getElementById("myModal" + ID);

    // Inicijaliziraj stanje moda ako ne postoji
    if (!modalStates[ID]) {
        modalStates[ID] = {
            visible: false
        };
    }

    // Promijeni stanje moda
    if (!modalStates[ID].visible) {
        modal.style.display = "block";
        modalStates[ID].visible = true;
    } else {
        modal.style.display = "none";
        modalStates[ID].visible = false;
    }
}

function deleteImage(ID, prefix) {
    // Ako želimo da korisnik potvrdi brisanje koristimo confirm
    if (confirm("Are you sure you want to delete this image?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = xhttp.responseText;
                console.log(response);
            }
        };

        var postContent = "ID=" + encodeURIComponent(ID) + "&prefix=" + encodeURIComponent(prefix);
        xhttp.open("POST", "deleteImage.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(postContent);
        var modal = document.getElementById("myModal" + ID);
        modal.style.display = "none";
        var image = document.getElementById("slika" + ID);
        image.style.display = "none";
    }
    var modal = document.getElementById("myModal" + ID);
    modal.style.display = "none";
}

function overlayClick(ID, putanja) {
    
    if(!modalStates[ID]){
        return;
    }
    else{
        var modal = document.getElementById("myModal" + ID);
        modal.style.display = "none";
        modalStates[ID].visible = false;
    }
    maxxSlika.innerHTML = slikaModal;
}

function enlargeImage(putanja){
    // funkcija za prikazivanje slike u modalu preko cijelog ekrana
    maxxSlika = document.getElementById("modalSlika");
    slikaModal = "<div><img src='" + putanja + "' alt=''></div>";
    maxxSlika.innerHTML = slikaModal;
}