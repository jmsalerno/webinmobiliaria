const menuToggle = document.querySelector(".burger-m-container");
const ulVisible = document.querySelector(".nav-list-container");




menuToggle.addEventListener("click", () => {

    
    ulVisible.classList.toggle("activate");

});