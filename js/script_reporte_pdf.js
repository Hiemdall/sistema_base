document.getElementById('Formulario').addEventListener('submit', function(e) {
    e.preventDefault();
  
    var sede = document.getElementById('sede').value;
  
    // Enviar solicitud AJAX para generar el reporte PDF
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Formulario.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.responseType = 'blob';
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Crear una URL del Blob recibido
        var blob = new Blob([xhr.response], {type: 'application/pdf'});
        var url = window.URL.createObjectURL(blob);
  
        // Crear un enlace y hacer clic en él para descargar el PDF
        var link = document.createElement('a');
        link.href = url;
        link.download = 'Formulario.pdf';
        link.click();
  
        // Liberar la URL creada
        window.URL.revokeObjectURL(url);
      }
    };
    xhr.send('sede=' + encodeURIComponent(sede));
  });
  