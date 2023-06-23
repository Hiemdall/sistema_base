document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita el envío del formulario
  
    // Muestra el pop-up
    document.getElementById("popup").style.display = "block";
  });
  
  document.getElementById("closePopup").addEventListener("click", function() {
    // Oculta el pop-up
    document.getElementById("popup").style.display = "none";
  });
  