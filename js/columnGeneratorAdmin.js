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
	if(numOfCols == 1){
		orderBy = prefix + "_Mobile_no";
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			var ColumnContent = "", SlikaItself, SlikaNaziv, SlikaDatum, SlikaStupacTV, SlikaStupacDesktop, SlikaStupacTablet, SlikaRbTV, SlikaRbDesktop, SlikaRbTablet, SlikaRbMobile, current_rb;
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
				
				const imgParentDiv = document.createElement('div');
								
				const imgDiv = document.createElement('div');
				imgDiv.classList.add('image');
				imgDiv.id = 'slika' + SlikaID;
				imgParentDiv.appendChild(imgDiv);
								
				const img = document.createElement('img');
				img.src = putanja + SlikaItself;
				img.alt = SlikaNaziv;
				img.loading = 'lazy';
				imgDiv.appendChild(img);

				const sequenceNum = document.createElement('div');
				sequenceNum.classList.add('sequenceNum');
				sequenceNum.innerText = current_rb;
				imgDiv.appendChild(sequenceNum);

				const edit = document.createElement('div');
				edit.classList.add('edit');
				edit.setAttribute("onclick", "toggleModal(" + SlikaID + ")");
				imgDiv.appendChild(edit);

				const editIcon1 = document.createElement('i');
				editIcon1.classList.add('fa-solid', 'fa-circle');
				edit.appendChild(editIcon1);
				
				const editIcon2 = document.createElement('i');
				editIcon2.classList.add('fa-solid', 'fa-circle');
				edit.appendChild(editIcon2);
				
				const editIcon3 = document.createElement('i');
				editIcon3.classList.add('fa-solid', 'fa-circle');
				edit.appendChild(editIcon3);
				
				const modal = document.createElement('div');
				modal.classList.add('modal');
				modal.id = 'myModal' + SlikaID;
				imgDiv.appendChild(modal);
				
				const button = document.createElement('button');
				button.classList.add('but1');
				button.id = 'myButton' + SlikaID;
				button.setAttribute("onclick", "deleteImage(" + SlikaID + ", '" + prefix + "')");
				button.innerText = 'Delete';
				modal.appendChild(button);
				
				const buttonIcon = document.createElement('i');
				buttonIcon.classList.add('fa-solid', 'fa-xmark');
				button.appendChild(buttonIcon);
				
				const overlay = document.createElement('div');
				overlay.classList.add('overlay');
				overlay.setAttribute("onclick", "openModal('" + putanja + SlikaItself + "')");
				imgDiv.appendChild(overlay);				
				
				const imageDesc = document.createElement('p');
				imageDesc.innerText = "#" + current_rb + " " + redniBroj + " " + SlikaDatum;
				overlay.appendChild(imageDesc);
				
				if(SlikaStupacTV == iFromAnotherMother && numOfCols == 4){
					ColumnContent += imgParentDiv.innerHTML;
				}
				if(SlikaStupacDesktop == iFromAnotherMother && numOfCols == 3){
					ColumnContent += imgParentDiv.innerHTML;
				}
				if(SlikaStupacTablet == iFromAnotherMother && numOfCols == 2){
					ColumnContent += imgParentDiv.innerHTML;
				}
				if(numOfCols == 1){
					ColumnContent += imgParentDiv.innerHTML;
				}
			}
			document.getElementById("stupac" + iFromAnotherMother + "").innerHTML = ColumnContent;
		}
	};
	
	var postContent = "source=" + encodeURIComponent(table) + "&orderBy=" + encodeURIComponent(orderBy);
	xhttp.open("POST", "GalleryQuery.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(postContent);
	
}

document.addEventListener("DOMContentLoaded", checkOnResize);
window.addEventListener("resize", checkOnResize);
