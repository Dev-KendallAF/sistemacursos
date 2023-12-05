@php
    $url = 'https://images.unsplash.com/photo-1588702547954-4800ead296ef?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';    
@endphp


<x-layouts.app title="Laravel Page" headerName="Home">
  <x-slot name="content">
  <div class="grid md:grid-cols-2 h-screen bg-gray-700 bg-cover bg-center md:bg-cover md:bg-right" style="background-image: url('{{$url}}')">
    <div class="h-full flex items-center backdrop-blur-sm bg-black/30  text-white">
      <div class="px-10">
        <p class="text-sm p-1 rounded-full inline px-3 font-semibold bg-gradient-to-r from-indigo-500 to-cyan-500 ">Mejores cursos de Programación</p>
        <h1 class="text-7xl font-bold ">Cursos.CR</h1>
        <p class="py-5 my-5"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro corrupti laborum esse distinctio? Obcaecati aperiam ullam ducimus sapiente iste, quos consequuntur dicta! Tempora voluptate obcaecati beatae porro laudantium. Commodi, nemo.</p>

        <a href="#cursos" class="  bg-gradient-to-r from-indigo-500 to-cyan-500  rounded-xl p-2 px-5 shadow-md  hover:to-indigo-600 hover:transition-all"><span> Realizar Matrícula</span> <i class="fa-solid fa-chevron-right fa-fade"></i> </a>
      </div>
    </div>
  </div>

  <div class="container my-36 mx-auto">
    <div class="grid text-center grid-cols-3 gap-6">
      <div class="bg-white dark:bg-gray-800 p-10 cursor-pointer shadow-xl rounded-lg h-100">
        <h1 class="my-3 dark:text-white">Todos los cursos gratis por <br> <b>7 dias</b> </h1>
        <p class="mt-10 mb-24 font-bold text-6xl dark:text-cyan-500 " >$5</p>
        <a href="#" class=" bg-gradient-to-r from-indigo-500 to-cyan-500  rounded-2xl p-3 px-5 shadow-md  hover:to-indigo-600 hover:transition-all text-white font-semibold"><span> Adquirir este plan</span> <i class="fa-solid fa-cart-shopping"></i> </a>
      </div>
      <div class="bg-white dark:bg-gray-800 p-10 cursor-pointer shadow-xl rounded-lg h-100">
        <h1 class="my-3 dark:text-white">Todos los cursos gratis por <br> <b>3 meses</b> </h1>
        <p class="mt-10 mb-24 font-bold text-6xl dark:text-cyan-500 " >$25</p>
        <a href="#" class="  bg-gradient-to-r from-indigo-500 to-cyan-500  rounded-2xl p-3 px-5 shadow-md  hover:to-indigo-600 hover:transition-all text-white font-semibold"><span> Adquirir este plan</span> <i class="fa-solid fa-cart-shopping"></i> </a>
      </div>
      <div class="bg-white dark:bg-gray-800 p-10 cursor-pointer shadow-xl rounded-lg h-100">
        <h1 class="my-3 dark:text-white">Todos los cursos gratis por <br> <b>1 año</b> </h1>
        <p class="mt-10 mb-24 font-bold text-6xl dark:text-cyan-500 " >$80</p>
        <a href="#" class="  bg-gradient-to-r from-indigo-500 to-cyan-500  rounded-2xl p-3 px-5 shadow-md  hover:to-indigo-600 hover:transition-all text-white font-semibold"><span> Adquirir este plan</span> <i class="fa-solid fa-cart-shopping"></i> </a>
      </div>
    </div>
  </div>
  <div class="container mx-auto" id="cursos">
  <h2 class="text-4xl font-semibold text-indigo-500 dark:text-cyan-300 my-7 text-center ">Seleccionar Curso</h2>
    <div class="flex flex-col flex-wrap  gap-5">
@foreach ([1,2,3,4,5,6,7,8,9, 10] as $i)
    <div class="bg-white dark:bg-gray-800 shadow-xl p-24 rounded-lg"></div>
    
@endforeach
    </div>
  </div>
  </x-slot>
</x-layouts.app>