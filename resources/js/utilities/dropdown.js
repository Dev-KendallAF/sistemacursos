import $ from "jquery";

$(document).ready(function () {
  let timeoutId; // Variable para almacenar el identificador del temporizador

  // Manejar clic en el dropdown
  $(document).on("click", ".dropdown", function (event) {
      event.stopPropagation(); // Evitar la propagación del clic al documento
      const dropdown = $(this).find(".dropdown__menu");
      dropdown.toggleClass('hidden');
      dropdown.css('opacity', 1); // Establecer opacidad en 1 cuando se muestra
  });

  // Manejar el evento al pasar el mouse sobre el dropdown
  $(document).on("mouseenter", ".dropdown", function () {
      clearTimeout(timeoutId); // Limpiar cualquier temporizador existente
      const dropdown = $(this).find(".dropdown__menu");
      dropdown.removeClass('hidden');
      dropdown.css('opacity', 1); // Establecer opacidad en 1 cuando se muestra
  });

  // Manejar el evento al quitar el mouse del dropdown
  $(document).on("mouseleave", ".dropdown", function () {
      const dropdown = $(this).find(".dropdown__menu");
      // Establecer un pequeño retraso antes de ocultar el dropdown
      timeoutId = setTimeout(function () {
          dropdown.addClass('hidden');
      }, 200); // Ajusta el valor del retraso según tus necesidades
  });

  // Manejar clic fuera del dropdown para cerrar todos los dropdowns
  $(document).on("click", function () {
      $(".dropdown__menu").addClass('hidden');
  });
});