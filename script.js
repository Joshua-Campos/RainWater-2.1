document.getElementById("formulario").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("calcular.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("resultado").innerHTML = 
            `<p>Volumen de agua captada: <strong>${data.agua_captada} L</strong></p>
             <p>Días de abastecimiento: <strong>${data.dias_abastecimiento}</strong></p>
             <button id="btnSiguiente">Siguiente día</button>
             <button id="btnReiniciar">Reiniciar</button>`;

        let nivel = document.getElementById("nivel-agua");
        let maxCapacidad = data.niveles_tanque[0] || 1; 
        let dias = data.niveles_tanque.length;
        let diaActual = 0;

        function actualizarTanque() {
            if (diaActual < dias) {
                let nivelActual = data.niveles_tanque[diaActual];
                let porcentaje = (nivelActual / maxCapacidad) * 100;
                nivel.style.height = `${porcentaje}%`;
                nivel.style.backgroundColor = porcentaje > 20 ? "#0275d8" : "red";  
                document.getElementById("texto-nivel").innerText = `Día ${diaActual + 1}: ${nivelActual} L`;
                diaActual++;
            } else {
                alert("No hay más agua disponible.");
            }
        }

        document.getElementById("btnSiguiente").addEventListener("click", actualizarTanque);
        
        document.getElementById("btnReiniciar").addEventListener("click", function() {
            diaActual = 0;
            actualizarTanque();
        });

        actualizarTanque();  // Mostrar el primer día al cargar los datos
    })
    .catch(error => console.error("Error en la petición:", error));
});
