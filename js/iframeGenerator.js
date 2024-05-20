function getValueLol(value1) {
	getDataFrom = value1;
    videoDisplay(getDataFrom);
}

function videoDisplay(table) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			var PageContent = "", VideoID, VideoNaziv, VideoLink, VideoDesc;
			var xml = xhttp.responseXML;
			var album = xml.getElementsByTagName("Video");
			for (let i = 0; i < album.length; i++){
				VideoID = album[i].getElementsByTagName("ID")[0].innerHTML;
				VideoNaziv = album[i].getElementsByTagName("Name")[0].innerHTML;
				VideoLink = album[i].getElementsByTagName("Link")[0].innerHTML;
				VideoDesc = album[i].getElementsByTagName("Desc")[0].innerHTML;
				
				console.log(VideoID);
				console.log(VideoNaziv);
				console.log(VideoLink);
				console.log(VideoDesc);

				const container = document.createElement('div');
								
				const video_container = document.createElement('div');
				video_container.classList.add('video-container');
				container.appendChild(video_container);
								
				const header = document.createElement('h3');
				header.innerText = VideoNaziv;
				header.classList.add('video-header');
				video_container.appendChild(header);

				const iframe_parent = document.createElement('div');
				iframe_parent.classList.add('iframe-parent');
				video_container.appendChild(iframe_parent);

				const iframe = document.createElement('iframe');
				iframe.src = VideoLink;
				iframe.alt = VideoNaziv;
				iframe.classList.add('video-iframe');
				// želimo dodati ove opcije u iframe: allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen" allowfullscreen
				iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen');
				iframe.setAttribute('allowfullscreen', '');
				iframe_parent.appendChild(iframe);

				const description = document.createElement('p');
				description.innerText = VideoDesc;
				description.classList.add('video-description');
				video_container.appendChild(description);	
				
				PageContent += container.innerHTML;
				console.log(PageContent);
			}


			document.getElementById("videoGalerija").innerHTML = PageContent;
		}
	};
    table = "musicspots";
    orderBy = "Spot_ID";
	var postContent = "source=" + encodeURIComponent(table) + "&orderBy=" + encodeURIComponent(orderBy);
	xhttp.open("POST", "videoGalleryQuery.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(postContent);
}

document.addEventListener('DOMContentLoaded', getValueLol);