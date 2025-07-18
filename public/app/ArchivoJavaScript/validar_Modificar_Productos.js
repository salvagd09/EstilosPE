document.addEventListener("DOMContentLoaded", function () {
  const btnGuardar = document.getElementById("guardar-btn");
  const selectProducto = document.getElementById("productos");
  const inputNombre = document.getElementById("nombre");
  const inputDescripcion = document.getElementById("descripcion");
  const inputPrecio = document.getElementById("precio");
  const mensajeError = document.getElementById("error-msg");

  btnGuardar.addEventListener("click", function (e) {
    e.preventDefault(); // Evita que se envíe si es submit

    const campos = [selectProducto, inputNombre, inputDescripcion, inputPrecio];
    let hayVacios = false;

    campos.forEach((campo) => {
      if (campo.value.trim() === "" || campo.value === "") {
        campo.style.border = "2px solid red";
        hayVacios = true;
      } else {
        campo.style.border = "";
      }
    });

    if (hayVacios) {
      mensajeError.style.display = "block";
      mensajeError.textContent = "⚠️ Por favor, complete todos los campos.";
    } else {
      mensajeError.style.display = "none";
      alert("Cambios guardados exitosamente ✅");

      // ✅ Limpiar todos los campos
      selectProducto.value = "";
      inputNombre.value = "";
      inputDescripcion.value = "";
      inputPrecio.value = "";

      // ✅ Quitar bordes rojos si quedaron
      campos.forEach((campo) => {
        campo.style.border = "";
      });
    }
  });
});