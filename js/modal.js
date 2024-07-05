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

function overlayClick(ID) {
    
    if(!modalStates[ID]){
        return;
    }
    else{
        var modal = document.getElementById("myModal" + ID);
        modal.style.display = "none";
        modalStates[ID].visible = false;
    }
}

/* -------------------- Expand image modal ------------------------ */

function openModal(src) {
    const modal = document.createElement('div');
    modal.classList.add('image-modal');
    modal.onclick = function() {
        modal.remove();
        enableScroll(); // Enable scroll when modal is closed
    };
    
    const modalBackground = document.createElement('div');
    modalBackground.classList.add('image-modal-bg');
    
    modal.appendChild(modalBackground);
    
    const img = document.createElement('img');
    img.src = src;
    img.classList.add('image-modal-img');
    modalBackground.appendChild(img);
    
    const closeBtn = document.createElement('span');
    closeBtn.classList.add('x-modal');
    modalBackground.appendChild(closeBtn);
    
    const modalContent = document.createElement('div');
    modalContent.classList.add('image-modal-content');
    modalBackground.appendChild(modalContent);

    console.log(modal);
    // getImageSize(src);
    
    document.body.appendChild(modal);
    disableScroll(); // Disable scroll when modal is opened
}

function disableScroll() {
    document.body.style.overflow = 'hidden';
}

function enableScroll() {
    document.body.style.overflow = 'auto';
}

// dodati funkciju koja zatvara modal klikom na pozadinu koristeći z-index, ako z-index nije isti kao kod moda, zatvori modal
// također možemo provjeriti je li klasa elementa na koji je korisnik kliknuo klasa modala, ako nije zatvori modal