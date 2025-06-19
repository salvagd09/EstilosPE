function validarLogin() {
  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();

  if (!username || !password) {
    alert("Por favor, completa todos los campos.");
    return false;
  }
  return true;
}
