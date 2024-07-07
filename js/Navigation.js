var toggleVal = 0;

document.getElementById('portfolio').addEventListener('click', function() {
    var dropdownContent = document.querySelector('.dropdown-content');
    var strelica = document.getElementById('arrow');

    toggleVal = toggleVal === 0 ? 1 : 0;

    if(toggleVal === 1) {
      document.getElementById('portfolio').style.pointerEvents = 'none';
      setTimeout(function() {
        document.getElementById('portfolio').style.pointerEvents = 'auto';
      }, 300);

      strelica.style.transform = 'rotate(-180deg)';
      dropdownContent.style.opacity = '0';
      dropdownContent.style.display = 'block';
      setTimeout(function() {
        dropdownContent.style.opacity = '1';
      }, 10);
    }

    if(!toggleVal) {
      document.getElementById('portfolio').style.pointerEvents = 'none';
      setTimeout(function() {
        document.getElementById('portfolio').style.pointerEvents = 'auto';
      }, 300);

      strelica.style.transform = 'rotate(0deg)';

      dropdownContent.style.opacity = '0';
      setTimeout(function() {
        dropdownContent.style.display = 'none';
      }, 250);
    }
});


document.getElementById('portfolio-mobile').addEventListener('click', function() {
    var dropdownContentDva = document.querySelector('.dropdown-mobile');
    var strelicaDva = document.getElementById('arrow-dva');

    // Promijeni ikonu strelice
    strelicaDva.classList.toggle('fa-caret-down');
    strelicaDva.classList.toggle('fa-caret-up');

    // Postavi visinu na nulu ako je strelica prema dolje, inače postavi željenu visinu
    dropdownContentDva.style.height = strelicaDva.classList.contains('fa-caret-up') ? '125px' : '0';
    dropdownContentDva.style.margin = strelicaDva.classList.contains('fa-caret-down') ? '0px 0px 0px 20px' : '10px 0px 0px 20px';
});


document.getElementById('bitchborgar').addEventListener('click', function() {
    document.querySelector('.mobile-navigation').style.display = 'flex';
    document.getElementById('x').addEventListener('click', function(){
        document.querySelector('.mobile-navigation').style.display = 'none';
    });
});

var previousPosition = window.scrollY;

window.onscroll = function() {
  var currentPosition = window.scrollY;

  if (previousPosition > currentPosition) {
    document.getElementById("nav-top").style.top = "0";
  } else {
    document.getElementById("nav-top").style.top = "-121px";
  }

  previousPosition = currentPosition;
};






