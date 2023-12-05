<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear Usuario</title>
        <script src="https://kit.fontawesome.com/eddade569a.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.scss','resources/js/app.js'])
        
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
      
      <div class="container mx-auto md:my-0">
        <div class="flex justify-center items-center h-screen ">
          <div class=" bg-white dark:bg-gray-800 shadow-2xl rounded-lg p-10 w-full md:w-9/12"> 
            <form action="{{route('persona.store')}}" method="POST">
              @csrf
              <div>
                <a href="{{route('index')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
                <h1 class="inline text-2xl font-bold text-indigo-600" >Crear Usuario Estudiante</h1>

              </div>
              <hr class="my-3">
              <div class="grid md:grid-cols-2 gap-3 mt-7">
                <!--Datos Personales-->
                <div>
          
                 <!-- NombreCompleto-->
                  <label for="txt_nombre" class=" dark:text-indigo-500"> <i class="fa-regular fa-user text-indigo-600 "></i> Nombre Completo</label>
                  <input type="text" name="nombreCompleto" id="txt_nombre" class="" placeholder="Ingresa el nombre completo" >
                 @error('nombreCompleto')
                     {{$message}}
                 @enderror
                  <!-- Identificacion-->
                  <label for="txt_cedula" class=" dark:text-indigo-500"> <i class="fa-regular fa-address-card text-indigo-600"></i> Identificaci&oacute;n</label>
                  <input type="text" name="identificacion" id="txt_cedula" class="" placeholder="_ ____ ___" >
                  @error('identificacion')
                  {{$message}}
                  @enderror
                 <!-- Fecha Nacimiento-->
                 <label for="txt_fechaNaciento" class=" dark:text-indigo-500"> <i class="fa-solid fa-cake-candles text-indigo-600"></i> Fecha Nacimiento</label>
                 <input type="date" name="fechaNacimiento" id="txt_fechaNaciento" class="" placeholder="" max = "@php echo date("Y-m-d",strtotime(date("Y-m-d")."- 10 years"));@endphp" >
                 @error('fechaNacimiento')
                 {{$message}}
                 @enderror
                </div>

                 <!-- Datos Usuario -->
                <div>
                 
                 <!-- Email -->
                <label for="txt_email" class="dark:text-indigo-500"> <i class="fa-regular fa-envelope text-indigo-600"></i> Correo electrónico </label>
                <input type="email" id="txt-email" name="email" placeholder="estudiante@cursos.cr" >
                @error('email')
                {{$message}}
                @enderror
                <!-- Password -->
                <div class="form-group-password">
                  <label for="txt_password" class="dark:text-indigo-500"><i class="fa-solid fa-lock text-indigo-600"></i> Contraseña</label>
                  <div class="relative mt-2 rounded-md shadow-sm">
                    <input type="password" name="password" id="txt_password"  placeholder="Ingresa tu contraseña">
                    <div class="absolute inset-y-0 right-0 flex items-center">
                      <button type="button" id="btn-togglepassword" class="_disable-btnPassword">
                        <i class="fa-solid fa-eye-slash"></i>
                      </button>
                    </div>
                  </div>
                </div>
                @error('password')
                {{$message}}
                @enderror
                 <!-- Telefono -->
                 <div>
                  <label for="txt_telefono" class="dark:text-indigo-500"><i class="fa-solid fa-phone text-indigo-600"></i> Tel&eacute;fono <span class="text-indigo-400">(opcional)</span></label>
                  <div class="relative mt-2 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                      <span class="text-gray-500 sm:text-sm"><x-icons.flag /></span>
                    </div>
                    <input type="text" name="telefono" id="txt_telefono"  style="padding-left: 2.2rem !important; " placeholder="+506">
                  </div>
                 </div>
                 @error('telefono')
                 {{$message}}
                 @enderror
                </div>

              </div>




              
              <div class="grid  items-center">
                <button type="submit" class="rounded-xl bg-indigo-600 w-100 my-10 p-2  shadow-md shadow-indigo-500/50 text-white  ">
                  Ingresar
                </button>
              </div>

              

             </form>

          </div>
         
        </div>
        
      </div> 

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

