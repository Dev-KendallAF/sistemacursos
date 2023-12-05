<header >
<div class="container mx-auto pt-36">
  <div class="grid sm:grid-cols-1  md:grid-cols-2 ">
    <!--Hero title-->
    <div class="p-8 " data-aos="fade-right" data-aos-duration="6000" >
      <img class=" h-10" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Logo">
      <p class="text-sm p-1 border rounded-full inline px-3 font-semibold text-gray-500 bg-gradient-to-r dark:from-indigo-500 dark:to-cyan-500 dark:text-white dark:border-none">Dev Kendall Fern&aacute;ndez</p>
      <h1 class="mt-2 mb-6 font-bold text-5xl dark:text-white"  >Introducci&oacute;n a Tailwind</h1>
     <p data-aos="fade-in" class="dark:text-white" >Framework con el puedes crear estilos r&aacute;pido, personalizado y flexibe, a diferencia de otros Frameworks CSS</p>
     <div class="my-5">
      <span class="trs p-2 display-1 font-semibold rounded-lg border-solid border-2 border-blue-600 hover:text-white bg-gradient-to-r hover:border-indigo-500  hover:from-indigo-500 hover:to-cyan-500">
        <a href="#info" data-aos="zoom-out" data-aos-duration="7000" class="dark:text-white">
          Ver m&aacute;s <i class="fa-solid fa-chevron-right fa-beat-fade pl-3 "></i>
        </a>
      </span>
     </div>
     
     
    </div>
    <!--CodeHero-->
    <div class="sm:p-0 md:p-8" data-aos="fade-up" >
      <div class="shadow-gray-700 mt-10	shadow-lg rounded bg-cyan-950 p-5 text-white">
        <code id='code'>

        </code>
      </div> 
    </div>
  </div>
</div>
</header>


<script>
  // Texto que deseas "escribir"
  const texto = `<div class="p-8">
          <h1 class="mt-2 mb-6 font-bold text-5xl ">Introducci&oacute;n a Tailwind</h1>
          <p>Framework con el puedes crear estilos r&aacute;pido, personalizado y flexibe, a diferencia de otros Frameworks CSS</p>
          <div class="my-5">
          <span class="p-2 display-1 font-semibold rounded-lg border-solid border-2 border-blue-600 transition  ease-in-out  hover:text-white bg-gradient-to-r hover:border-indigo-500  hover:from-indigo-500 hover:to-cyan-500">
          <a href="#info">
                Ver m&aacute;s <i class="fa-solid fa-chevron-right fa-beat-fade pl-3 "></i>
                </a>
                </span>
                </div>
                </div>`;

// Elemento donde deseas mostrar el texto
const textContainer = document.getElementById("code");

// Función para simular la escritura
function escribirTexto() {
  let i = 0;
  const velocidadEscritura = 10; // Velocidad de escritura (en milisegundos)

  function escribirCaracter() {
    if (i < texto.length) {
      textContainer.innerHTML += texto.charAt(i);
      i++;
      setTimeout(escribirCaracter, velocidadEscritura);
    }
  }

  escribirCaracter();
}

// Iniciar la escritura cuando la página se carga
window.addEventListener("load", escribirTexto);
</script>