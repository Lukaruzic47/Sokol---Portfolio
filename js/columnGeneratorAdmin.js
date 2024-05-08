var currentWindowSize = window.innerWidth;
var currentColNumber;
var getDataFrom = "";


function getValueLol(value1) {
	getDataFrom = value1;
}

function checkOnResize() {
	currentWindowSize = window.innerWidth;
	if (currentColNumber != 4 && currentWindowSize > 1920) {
		// dodaj funkciju za povecanje na 4 columna
		columnGeneration(4);
	}
	if (
		currentColNumber != 3 &&
		currentWindowSize <= 1920 &&
		currentWindowSize > 1480
	) {
		// dodaj funkciju za smanjivanje na 3 columna
		columnGeneration(3);
	}
	if (
		currentColNumber != 2 &&
		currentWindowSize > 800 &&
		currentWindowSize <= 1480
	) {
		// dodaj funkciju za povećanje na 2 columna
		columnGeneration(2);
	}
	if (currentColNumber != 1 && currentWindowSize <= 800) {
		// dodaj funkciju za smanjivanje na 1 columna
		columnGeneration(1);
	}
}

function columnGeneration(columns) {
	currentColNumber = columns;
	var stupac = "";
	for (let i = 1; i <= columns; i++) {
		stupac += "<div class='columns column" + i + "' id='stupac" + i + "'></div>"
		document.getElementById("Galerija").innerHTML = stupac;
		imageDisplay(columns, getDataFrom, i);
	}
}

function imageDisplay(numOfCols, table, iFromAnotherMother) {
	var orderBy = "", redniBroj = "";

	if(getDataFrom == "cimages"){
		var prefix = "CI";
		var putanja = "images/Color/";
	}
	else{
		var prefix = "BW";
		var putanja = "images/BlackWhite/";
	}

	if(numOfCols == 4){
		orderBy = prefix + "_TV_no";
	}
	if(numOfCols == 3){
		orderBy = prefix + "_Desktop_no";
	}
	if(numOfCols == 2){
		orderBy = prefix + "_Tablet_no";
	}
	else{
		orderBy = prefix + "_Mobile_no";
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			var ispisSlika = "", ColumnContent = "", SlikaItself, SlikaNaziv, SlikaDatum, SlikaStupacTV, SlikaStupacDesktop, SlikaStupacTablet, SlikaRbTV, SlikaRbDesktop, SlikaRbTablet, SlikaRbMobile, current_rb;
			var xml = xhttp.responseXML;
			var album = xml.getElementsByTagName("Image");
			for (let i = 0; i < album.length; i++){
				SlikaID = album[i].getElementsByTagName("ID")[0].innerHTML;
				SlikaNaziv = album[i].getElementsByTagName("Name")[0].innerHTML;
				SlikaItself = album[i].getElementsByTagName("Image_Path")[0].innerHTML;
				SlikaDatum = album[i].getElementsByTagName("Date")[0].innerHTML;
				SlikaStupacTV = album[i].getElementsByTagName("TV_Column")[0].innerHTML;
				SlikaStupacDesktop = album[i].getElementsByTagName("Desktop_Column")[0].innerHTML;
				SlikaStupacTablet = album[i].getElementsByTagName("Tablet_Column")[0].innerHTML;
				SlikaRbTV = album[i].getElementsByTagName("TV_Position")[0].innerHTML;
				SlikaRbDesktop = album[i].getElementsByTagName("Desktop_Position")[0].innerHTML;
				SlikaRbTablet = album[i].getElementsByTagName("Tablet_Position")[0].innerHTML;
				SlikaRbMobile = album[i].getElementsByTagName("Mobile_Position")[0].innerHTML;

				if(numOfCols == 1)current_rb = SlikaRbMobile;
				if(numOfCols == 2)current_rb = SlikaRbTablet;
				if(numOfCols == 3)current_rb = SlikaRbDesktop;
				if(numOfCols == 4)current_rb = SlikaRbTV;
				
				ispisSlika = "<div class='image' id='slika" + SlikaID + "'><img src='" + putanja + SlikaItself +"' alt='" + SlikaNaziv +"' loading='lazy'><div class='edit' onclick='toggleModal(" + SlikaID + ")'><i class='fa-solid fa-circle'></i><i class='fa-solid fa-circle'></i><i class='fa-solid fa-circle'></i></div><div class='modal' id='myModal" + SlikaID + "'><button id='myButton" + SlikaID + "' onclick='deleteImage(" + SlikaID + ", \"" + prefix + "\")' class='but1'>Delete<i class='fa-solid fa-xmark'></i></button></div><div class='overlay' onclick='overlayClick(" + SlikaID + ")'><p>#" + current_rb + " " + redniBroj + " " + SlikaDatum + "</p></div></div>";

				
			
			if(SlikaStupacTV == iFromAnotherMother && numOfCols == 4){
				ColumnContent += ispisSlika;
			}
			if(SlikaStupacDesktop == iFromAnotherMother && numOfCols == 3){
				ColumnContent += ispisSlika;
			}
			if(SlikaStupacTablet == iFromAnotherMother && numOfCols == 2){
				ColumnContent += ispisSlika;;
			}
			if(numOfCols == 1){
				ColumnContent += ispisSlika;
			}
			}

			document.getElementById("stupac" + iFromAnotherMother + "").innerHTML = ColumnContent;
		}
	};
	
	var postContent = "source=" + encodeURIComponent(table) + "&orderBy=" + encodeURIComponent(orderBy);
	xhttp.open("POST", "colorGalleryQuerry.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(postContent);
	
}

document.addEventListener("DOMContentLoaded", checkOnResize);
window.addEventListener("resize", checkOnResize);
