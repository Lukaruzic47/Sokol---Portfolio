var currentWindowSize = window.innerWidth;
var currentColNumber;
var getDataFrom = "";


function getValueLol(value1) {
	getDataFrom = value1;
}

function checkOnResize() {
	currentWindowSize = window.innerWidth;
	if (currentColNumber != 4 && currentWindowSize > 1800) {
		// dodaj funkciju za povecanje na 4 columna
		columnGeneration(4);
	}
	if (
		currentColNumber != 3 &&
		currentWindowSize <= 1800 &&
		currentWindowSize > 1200
	) {
		// dodaj funkciju za smanjivanje na 3 columna
		columnGeneration(3);
	}
	if (
		currentColNumber != 2 &&
		currentWindowSize > 650 &&
		currentWindowSize <= 1200
	) {
		// dodaj funkciju za povećanje na 2 columna
		columnGeneration(2);
	}
	if (currentColNumber != 1 && currentWindowSize <= 650) {
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
	var orderBy = "";

	if(numOfCols == 4){
		orderBy = "CI_TV_no";
	}
	if(numOfCols == 3){
		orderBy = "CI_Desktop_no";
	}
	if(numOfCols == 2){
		orderBy = "CI_Tablet_no";
	}
	else{
		orderBy = "CI_Mobile_no";
	}

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			var ispisSlika = "", ColumnContent = "", SlikaItself, SlikaNaziv, SlikaDatum, SlikaStupacTV, SlikaStupacDesktop, SlikaStupacTablet;
			var xml = xhttp.responseXML;
			var album = xml.getElementsByTagName("Image");
			for (let i = 0; i < album.length; i++){
				SlikaNaziv = album[i].getElementsByTagName("Name")[0].innerHTML;
				SlikaItself = album[i].getElementsByTagName("Image_Path")[0].innerHTML;
				SlikaDatum = album[i].getElementsByTagName("Date")[0].innerHTML;
				SlikaStupacTV = album[i].getElementsByTagName("TV_Column")[0].innerHTML;
				SlikaStupacDesktop = album[i].getElementsByTagName("Desktop_Column")[0].innerHTML;
				SlikaStupacTablet = album[i].getElementsByTagName("Tablet_Column")[0].innerHTML;

				ispisSlika = "<div class='image'><img src='images/" + SlikaItself +"' alt='" + SlikaNaziv +"'><div class='overlay'><p>" + SlikaDatum + "</p></div></div>";
			
			console.log("iFromAnotherMother: " + iFromAnotherMother + " i: "+ i + ispisSlika);
			if(SlikaStupacTV == iFromAnotherMother && numOfCols == 4){
				ColumnContent += ispisSlika;
			}
			if(SlikaStupacDesktop == iFromAnotherMother && numOfCols == 3){
				ColumnContent += ispisSlika;
			}
			if(SlikaStupacTablet == iFromAnotherMother && numOfCols == 2){
				ColumnContent += ispisSlika;
			}
			if(numOfCols == 1){
				ColumnContent += ispisSlika;
			}
			console.log("ColumnContent: " + ColumnContent);
			}

			document.getElementById("stupac" + iFromAnotherMother + "").innerHTML = ColumnContent;
		}
	};

	var postContent = "source=" + encodeURIComponent(table) + "&orderBy=" + encodeURIComponent(orderBy);

	xhttp.open("POST", "colorGalleryQuerry.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(postContent);

	//tinjosipsokol.local/colorGalleryQuerry.php?source=cimages&orderBy=CImages_ID
}

document.addEventListener("DOMContentLoaded", checkOnResize);
window.addEventListener("resize", checkOnResize);
