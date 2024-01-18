<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perfil</title>
        <script src="https://kit.fontawesome.com/eddade569a.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.scss','resources/js/app.js'])
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
      <div class="container mx-auto mt-20 ">
          <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg p-10 "> 
            <div>
              <a href="{{route('index')}}" class="text-sm font-semibold text-indigo-400 transition ease-in hover:underline hover:underline-offset-4"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i> Regresar</a>
            </div>
            <h1 class="text-5xl mt-3 dark:text-white font-bold">{{$persona->nombreCompleto}}</h1>
          </div>
          @if ( session('success') )
          <div class="bg-green-300 dark:bg-green-500 p-3 mt-5 rounded-lg shadow-xl transition ease-in font-semibold dark:text-white ">
            <i class="fa-regular fa-circle-check fa-bounce"></i>
            {{session('success')}}
          </div>
          @endif

          <div class="dashboard__porfile">
            <div class="dashboard__photo">
              <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg"   class="dashboard__photo--image">  
            </div>
            <div class="dashboard__data">
              <div>
                <h2>Nombre Completo:</h2>
                <p>{{$persona->nombreCompleto}}</p>
              </div>
              <div>
                <h2>Identificación:</h2>
                <p>{{$persona->identificacion}}</p>
              </div>
              <div>
                <h2>Fecha Nacimiento:</h2>
                <p>{{$persona->fechaNacimiento}}</p>
              </div>
              <div>
                <h2>Edad Actual:</h2>
                @php
                    // Obtiene el año de la fecha de nacimiento
                    $year = \Carbon\Carbon::createFromFormat('Y-m-d', $persona->fechaNacimiento)->year;
                    // Calcula la diferencia de años
                    $edad = \Carbon\Carbon::now()->year - $year;
                @endphp
                <p>{{$edad}} años</p>
              </div>
              <div>
                <h2>Email:</h2>
                <p>{{$email}}</p>
              </div>
    
              <div>
                <a href="{{route('user.edit') }}" class="text-sm font-semibold text-indigo-400 transition ease-in hover:underline hover:underline-offset-4"> Modificar perfil</a>
              </div>
            </div>
          </div>
      </div> 




    </div>

      <script src="{{ mix('js/app.js') }}"></script>

      <script>
         document.addEventListener('DOMContentLoaded', function () {
          const btnPassword = document.getElementById('btn-togglepassword');
          let passwordVisible = false;

          btnPassword.addEventListener('click', function () {
            passwordVisible = !passwordVisible;
            const passwordInput = document.getElementById('txt_password');

            if (passwordVisible) {
              // Muestra la contraseña
              btnPassword.innerHTML = '<i class="fa-solid fa-eye"></i>';
              btnPassword.classList.remove("_disable-btnPassword")
              btnPassword.classList.add("_active-btnPassword")
              // Cambia el tipo de input a texto para mostrar la contraseña
              passwordInput.type = 'text';
            } else {
              // Oculta la contraseña
              btnPassword.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
              btnPassword.classList.remove("_active-btnPassword")
              btnPassword.classList.add("_disable-btnPassword")

              // Cambia el tipo de input a contraseña para ocultar la contraseña
              passwordInput.type = 'password';
            }
          });
        });
      </script>

    </body>
</html>
