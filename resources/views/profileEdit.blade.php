<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Perfil</title>
        <script src="https://kit.fontawesome.com/eddade569a.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.scss','resources/js/app.js'])
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
      <div class="container mx-auto mt-20 ">
        <div class="historyLink">
          <a href="{{route('user.perfil')}}" >Mi Perfil /</a>
          <a href="#" class="active">editar /</a>
  
          <h1>
            {{$persona->nombreCompleto}}</h1>
        </div>
          

          <div class="dashboard__porfile">
            <div class="dashboard__photo">
              <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg"   class="dashboard__photo--image">  
            </div>
            <div class="dashboard__data">
              <div>
                <a href="{{route('user.perfil')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
                <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
              </div>
              <hr class="my-3">
              <form action="{{route('user.update') }}" method="POST">
            
                @method('PUT')
                @csrf
                <!--NombreCompleto-->
                <div class="form-group @error('nombreCompleto') invalid @enderror">
                  <label for="txt_nombre" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-regular fa-user text-indigo-600 "></i> Nombre Completo</label>
                  <input type="text" name="nombreCompleto" id="txt_nombre" mask="char" placeholder="Ingresa el nombre completo"  value="{{$persona->nombreCompleto}}" autocomplete="off" >
                  @error('nombreCompleto')
                  <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                  @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                <!-- Identificacion-->
                <div class="form-group @error('identificacion') invalid @enderror">
                  <label for="txt_cedula" class=" dark:text-indigo-500"> <i class="fa-regular fa-address-card text-indigo-600"></i> Identificaci&oacute;n</label>
                  <input type="text" name="identificacion" id="txt_cedula" class="" mask='dni' placeholder="_ ____ ___"  autocomplete="off" value="{{ $errors->any() ? old('identificacion') : $persona->identificacion }}">
                  @error('identificacion')
                  <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                  @enderror
                </div>
    
                <!-- Fecha Nacimiento-->
                <div class="form-group  @error('fechaNacimiento') invalid @enderror">
                  <label for="txt_fechaNaciento" class=" dark:text-indigo-500"> <i class="fa-solid fa-cake-candles text-indigo-600"></i> Fecha Nacimiento</label>
                  <input type="date" name="fechaNacimiento" id="txt_fechaNaciento"  max = "@php echo date("Y-m-d",strtotime(date("Y-m-d")."- 10 years"));@endphp" value="{{$persona->fechaNacimiento}}">
                  @error('fechaNacimiento')
                  <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                  @enderror
                </div>
                </div>
    
                <div class="grid grid-cols-2 gap-4">
    
                    <!-- Email -->
                    <div class="form-group @error('email') invalid @enderror">
                    <label for="txt_email" class="dark:text-indigo-500"> <i class="fa-regular fa-envelope text-indigo-600"></i> Correo electrónico </label>
                    <input type="text" id="txt-email" name="email" placeholder="estudiante@cursos.cr" autocomplete="off" value="{{ $errors->any() ? old('email') : $email }}">
                    @error('email')
                    <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                    @enderror
                  </div>
                  <!-- Password 
                  <div class=" form-group @error('password') invalid @enderror">
                    <label for="txt_password" class="dark:text-indigo-500"><i class="fa-solid fa-lock text-indigo-600"></i> Contraseña</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                      <input type="password" name="password" id="txt_password"  placeholder="Ingresa tu contraseña" autocomplete="off">
                      <div class="absolute inset-y-0 right-0 flex items-center">
                        <button type="button" id="btn-togglepassword" class="_disable-btnPassword">
                          <i class="fa-solid fa-eye-slash"></i>
                        </button>
                      </div>
                    </div>
                    @error('password')
                    <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                    @enderror
                  </div>
                </div>
             
              <div class="grid grid-cols-2 gap-4">
     -->

    
    
                <!-- Telefono -->
                <div>
                <label for="txt_telefono" class="dark:text-indigo-500"><i class="fa-solid fa-phone text-indigo-600"></i> Tel&eacute;fono <span class="text-indigo-400">(opcional)</span></label>
                <div class="relative mt-2 rounded-md shadow-sm">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="text-gray-500 sm:text-sm"><x-icons.flag /></span>
                  </div>
                  <input type="text" name="telefono" id="txt_telefono" mask='+5\06\ 0000-0000' autocomplete="off"  style="padding-left: 2.2rem !important; " placeholder="+506" value="{{$persona->telefono}}">
                </div>
                @error('telefono')
                <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                @enderror
                </div>
      
              </div>
              <div class="grid items-center">
                <button type="submit" class="rounded-xl bg-indigo-600 w-100 my-2 p-2  shadow-md shadow-indigo-500/50 text-white  ">
                  Realizar Cambios
                </button>
              </div>
            </form>

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