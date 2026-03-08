document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch("recoger.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => alert(data))  // Asegúrate de que el mensaje de éxito o error llegue correctamente
    .catch(error => console.error("Error:", error));
});