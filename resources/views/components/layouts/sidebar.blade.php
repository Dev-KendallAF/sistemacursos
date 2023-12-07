  <!-- Sidebar -->
  <div class="sidebar ">
  <!-- Header Sidebar -->
    <div class="_sidebar__header p-3">
        <div class="flex place-items-center gap-3">
          <div class="hidden">
          <img src="" class="inline w-10 h-10 content-center	"  >  
          </div>
          <div>
            <a href="#" class="dark:text-white text-3xl font-bold content-center	">{{$nombreEmpresa}}</a>
          </div>

        </div>
        <hr class="my-3">

    </div>
  <!--Body Sidebar  -->
    <div class="sidebar__body">
        <ul>
          <li class="sidebar__item ">
            <a href="{{route('dashboard')}}" class="sidebar__link  @if($sidebarIndex=='1') sidebar__link--active @endif " >
              <div class="sidebar__icon">
                <i class="fa-solid fa-chart-pie"></i>
              </div>
              <div>
                <p> Estadisticas </p>
              </div>
            </a>
          </li>
          <li class="sidebar__item ">
            <a href="{{route('teacher.index')}}" class="sidebar__link  @if($sidebarIndex=='2') sidebar__link--active @endif " >
              <div class="sidebar__icon">
                <i class="fa-solid fa-chalkboard-user"></i>
              </div>
              <div>
                <p> Profesores </p>
              </div>
            </a>
          </li>

            <li class="sidebar__item">
              <a href="#" class="sidebar__link  @if($sidebarIndex=='3') sidebar__link--active @endif">
                <div class="sidebar__icon">
                  <i class="fa-solid fa-book"></i> 
                </div>
                <div>
                  <p> Cursos</p>
                </div>
              </a>
            </li>


            <li class="sidebar__item">
              <a href="{{route('student.index')}}" class="sidebar__link  @if($sidebarIndex=='4') sidebar__link--active @endif">
                <div class="sidebar__icon">
                  <i class="fa-solid fa-people-group"></i>
                </div>
                <div>
                  <p> Estudiantes </p>
                </div>
              </a>
            </li>
            <li class="sidebar__item">
              <a href="#" class="sidebar__link ">
                <div class="sidebar__icon">
                  <i class="fa-solid fa-book-open"></i>
                </div>
                <div>
                  <p> Catogorias </p>
                </div>
              </a>
            </li>
           



            <!-- ... otras opciones del sidebar ... -->
        </ul>
    </div>

    <div class="sidebar__footer p-5">
      <div class="sidebar__footer--content">
        <div class="sidebar__porfile">
          <div>
            <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg"   class="sidebar__porfile--image">  
          </div>


   <!--Dropdown-->
   <div class="dropdown" onclick="toggleDropdown(this)">
    <div class="dropdown__header">
      <button type="button"  >
        Opciones
        <i class="fa-solid fa-angle-down pt-1.5 text-gray-500"></i>
      </button>
    </div>

    <div class="dropdown__menu hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
      <div class="py-1" role="none">
        <a href="#" class="" role="menuitem" tabindex="-1" id="menu-item-0">Ver Perfil</a>
        <a href="#" class="text-gray-700 block px-4 py-1 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Modificar</a>
      </div>
      <div class="py-1" role="none">
        <a href="{{route('user.logout')}}" class="text-gray-700 block px-4 py-1 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Cerrar Sesi&oacute;n</a>
      </div>
    </div>

  </div>


        </div>

        
        <div class=" sidebar__returnHome">
          <a href="{{route('index')}}" class="my-5">
            <i class="fa-solid fa-house"></i> Regresar 
          </a>
            <button id="darkModeToggle" class=" shadow-lg  bg-gray-300 rounded-lg duration-300 ease-in-out">
              <i class="fa-solid p-2  fa-sun " id="iconDarkMode"></i>
            </button>
        </div>
      
      </div>
    </div>
</div>



<!-- Contenido principal -->
<div class="dashboard__content md:ml-64 ">
    {{$content}}
</div>

<script>
        //Visual
        const darkModeButton = document.getElementById("darkModeToggle");
        const icon = document.getElementById("iconDarkMode");
        
        function IconToggle()
        { 
            darkModeButton.classList.toggle("bg-gray-300");
            darkModeButton.classList.toggle("bg-cyan-300");
            icon.classList.toggle("fa-moon");
            icon.classList.toggle("fa-sun");

        }


        //Theme Vars
        const userTheme = localStorage.getItem("theme")
        const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

        function ThemeSwitch()
        {
            if(document.documentElement.classList.contains("dark"))
            {
                document.body.classList.remove('darkMode')
                document.documentElement.classList.remove("dark");
                localStorage.setItem("theme","light")
                document.body.classList.add('lightMode')

                IconToggle();
                return;
            }
            document.body.classList.remove('lightMode')
            document.documentElement.classList.add("dark")
            document.body.classList.add('darkMode')

            localStorage.setItem("theme","dark")
            IconToggle();
        }

        function ThemeCheck()
        {
            if(userTheme==="dark" || (!userTheme && systemTheme))
            {
                document.documentElement.classList.add("dark")
                document.body.classList.add('darkMode')
                IconToggle();
                return;
            }
            document.body.classList.add('lightMode')
        }

    // Initialize dark mode based on user preference
    ThemeCheck();

    // Add click event listener to the button
    document.getElementById("darkModeToggle").addEventListener("click", ThemeSwitch);
</script>