document.getElementById('portfolio').addEventListener('click', function() {
    var dropdownContent = document.querySelector('.dropdown-content');
    var strelica = document.getElementById('arrow');

    // Promijeni ikonu strelice
    strelica.classList.toggle('fa-caret-down');
    strelica.classList.toggle('fa-caret-up');

    // Prikaži ili sakrij dropdown
    dropdownContent.style.display = strelica.classList.contains('fa-caret-up') ? 'block' : '';
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




