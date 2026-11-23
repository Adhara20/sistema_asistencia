const pestanas = document.querySelectorAll(".categoria-lista");
const tablas = document.querySelectorAll(".lista-tabla-contenedor");
const filtros = document.querySelectorAll(".filtros-desplegables");

pestanas.forEach((pestana) => {
  pestana.addEventListener("click", () => {
    const tablaSeleccionada = pestana.dataset.tabla;

    // Mostrar únicamente la tabla seleccionada
    tablas.forEach((tabla) => {
      tabla.hidden = tabla.id !== tablaSeleccionada;
    });

    // Ocultar los filtros en la pestaña de advertencias
    filtros.forEach((filtro) => {
      filtro.hidden = tablaSeleccionada === "tabla-advertencias";
    });

    // Actualizar la pestaña activa
    pestanas.forEach((elemento) => {
      elemento.classList.remove("categoria-activa");
    });

    pestana.classList.add("categoria-activa");
  });
});
