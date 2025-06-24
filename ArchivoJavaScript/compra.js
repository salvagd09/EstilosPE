// compra.js

document.addEventListener("DOMContentLoaded", function () {
  const botones = document.querySelectorAll(".btn-comprar");

  botones.forEach((boton) => {
    boton.addEventListener("click", function () {
      const tarjeta = boton.closest(".Tarjeta");
      const nombre = tarjeta.querySelector("h2").textContent;
      const precio = tarjeta.querySelector(".Precio1").textContent;
      const imagen = tarjeta.querySelector("img").getAttribute("src");

      const producto = {
        nombre,
        precio,
        imagen,
      };

      localStorage.setItem("productoSeleccionado", JSON.stringify(producto));
      window.location.href = "Compra.html";
    });
  });
});
