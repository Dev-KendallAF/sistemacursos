<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar Sesión</title>
        <script src="https://kit.fontawesome.com/eddade569a.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.scss','resources/js/app.js'])
        
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
      <div class="container mx-auto  ">
        <div class="flex justify-center items-center h-screen ">
          <div class=" bg-white dark:bg-gray-800 shadow-2xl rounded-lg p-10 w-7/12"> 
          <h1 class="text-xl text-indigo-500 font-bold mb-5">CursosCR te da la bienvenida a nuestra familia</h1>
            <p class="dark:text-white ">Revisa tu bandeja de entrada de tu correo eléctronico <b> {{session('email')}} </b> </p>
            <hr class="my-3">
            <p class="dark:text-white text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint, repudiandae veniam! Accusamus dolorum asperiores a, cumque, cum reprehenderit ipsum itaque fuga in aspernatur deleniti omnis molestiae, reiciendis voluptatibus eveniet aliquid</p>
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
