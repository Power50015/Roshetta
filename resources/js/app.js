// require("./bootstrap");

// import Alpine from "alpinejs";

// window.Alpine = Alpine;

// Alpine.start();
document.getElementById("nav-drop-dawn").style.display = "none";
document
    .getElementById("nav-drop-dawn-btn")
    .addEventListener("click", function () {
        if (document.getElementById("nav-drop-dawn").style.display === "none") {
            document.getElementById("nav-drop-dawn").style.display = "block";
        } else {
            document.getElementById("nav-drop-dawn").style.display = "none";
        }
    });
