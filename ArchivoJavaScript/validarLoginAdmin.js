document.getElementById("formulario").addEventListener("submit", function(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario").value;
    const contraseña = document.getElementById("contraseña").value;
    const mensaje = document.getElementById("oculto");

    if (!usuario || !contraseña) {
        mensaje.innerHTML = '<div class="alerta">Ambos campos deben estar llenos</div>';
        return;
    }
    fetch('../Archivosphp/Acceder_paginas.php', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `usuario=${encodeURIComponent(usuario)}&contraseña=${encodeURIComponent(contraseña)}`
    })
    .then(response => {
        if (response.redirected) {
            window.location.href = response.url;
        } else {
            return response.text();
        }
    })
    .then(data => {
        if (data) mensaje.innerHTML = data;
    })
    .catch(error => {
        mensaje.innerHTML = '<div class="alerta">Error de conexión</div>';
    });
});
