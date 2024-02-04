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

function overlayClick(ID) {
    var modal = document.getElementById("myModal" + ID);
    modal.style.display = "none";
    modalStates[ID].visible = false;
}
