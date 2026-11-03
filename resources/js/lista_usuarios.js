const pestanas = document.querySelectorAll(".categoria-usuario");
const tablas = document.querySelectorAll(".lista-tabla-contenedor");

pestanas.forEach((pestana) => {
  pestana.addEventListener("click", () => {
    const tablaSeleccionada = pestana.dataset.tabla;

    // Mostrar únicamente la tabla seleccionada
    tablas.forEach((tabla) => {
      tabla.hidden = tabla.id !== tablaSeleccionada;
    });

    // Actualizar la pestaña activa
    pestanas.forEach((elemento) => {
      elemento.classList.remove("categoria-activa");
    });

    pestana.classList.add("categoria-activa");
  });
});
