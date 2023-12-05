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

            <form action="" method="POST">
              @csrf
              <div>
                <a href="{{route('index')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
                <h1 class="inline text-2xl font-bold text-indigo-600" >Iniciar Sesión</h1>
              </div>
              <hr class="my-3">
              <div class="mt-7">
                <label for="txt_email" class=""> <i class="fa-regular fa-user"></i> Correo electrónico </label>
                <input type="email" id="txt-email" class="" placeholder="estudiante@cursos.cr" required>
        
                <div class="form-group-password">
                  <label for="txt_password"><i class="fa-solid fa-lock"></i> Contraseña</label>
  
                  <div class="relative mt-2 rounded-md shadow-sm">
                    <input type="password" name="password" id="txt_password"  placeholder="Ingresa tu contraseña">
                    <div class="absolute inset-y-0 right-0 flex items-center">
                      <button type="button" id="btn-togglepassword" class="_disable-btnPassword">
                        <i class="fa-solid fa-eye-slash"></i>
                      </button>
                    </div>
                  </div>
                </div>
  
                
                <div class="grid  items-center">
                  <button type="submit" class="rounded-xl bg-indigo-600 w-100 my-10 p-2  shadow-md shadow-indigo-500/50 text-white  ">
                    Ingresar
                  </button>
                </div>
              </div>


              

             </form>

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
