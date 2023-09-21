function toggleNavbar() {
    var navbar = document.getElementById("navbar");
    if (navbar.style.width === "21vh") {
        navbar.style.width = "5vh";
    } else {
        navbar.style.width = "21vh";
    }
}

var dropdown = document.getElementById("dropdown");
var navbarContainer = document.querySelector(".navbar-container");
var mainTopMargin = document.querySelector(".main-top-margin");


function toggleDropdown() {
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
        headerNavbarContainer.style.marginTop = "0"; // Remettre la marge à 0
        mainTopMargin.style.marginTop = "0"; // Remettre la marge à 0
    } else {
        dropdown.style.display = "block";
        headerNavbarContainer.style.marginTop = (dropdown.offsetHeight + 20) + "px"; // Ajouter une marge pour la navbar
        mainTopMargin.style.marginTop = (dropdown.offsetHeight + 20) + "px"; // Ajouter une marge pour le main
    }
}
