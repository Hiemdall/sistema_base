document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector(".dropdown");
    var dropdownContent = document.querySelector(".dropdown-content");
  
    dropdown.addEventListener("click", function() {
      dropdownContent.classList.toggle("show");
    });
  
    window.addEventListener("click", function(event) {
      if (!dropdown.contains(event.target)) {
        dropdownContent.classList.remove("show");
      }
    });
  });