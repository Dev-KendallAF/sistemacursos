<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Validaci&oacute;n Email</title>
        <script src="https://kit.fontawesome.com/eddade569a.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.scss','resources/js/app.js'])
        
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
      <div class="container mx-auto  ">
        <div class="flex justify-center items-center h-screen ">
          <div class=" bg-white dark:bg-gray-800 shadow-2xl rounded-lg p-10 w-7/12"> 
          <h1 class="text-xl text-indigo-500 font-bold mb-5">Lo Sentimos! </h1>
            <p class="dark:text-white "><b class="text-3xl ">:(</b> No tienes los permisos necesarios </p>
            <hr class="my-3">
            <p class="dark:text-white text-sm">Puedes comunicarte con uno de nuestros administradores para atender y solucionar tu problema.</p>
            <div class="text-center grid items-center">
              <a href="{{route('index')}}" class="rounded-xl  bg-gradient-to-r from-cyan-300 via-purple-500 to-pink-500  w-100 my-10 p-2  shadow-md shadow-indigo-500/50 text-white  ">
                Regresar a la pagina principal
              </a>
            </div>
          </div>
        </div>
      </div> 


    </body>
</html>
