<x-layouts.panel  headerName="Profesores" index='2'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="{{route('teacher.index')}}" >Profesores /</a>
        <a href="#" class="active">ver /</a>

        
        <h1>
          {{$persona->nombreCompleto}}</h1>
      </div>
      
      <!--data-->
      <div class="dashboard__porfile">
        <div class="dashboard__photo">
          <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg"   class="dashboard__photo--image">  
        </div>
        <div class="dashboard__data">
          <div>
            <a href="{{route('teacher.index')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
            <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
          </div>
          <hr class="my-3">
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
            <a href="{{route('teacher.edit', $persona->id) }}" class="text-sm font-semibold text-indigo-400 transition ease-in hover:underline hover:underline-offset-4"> Modificar profesor</a>
          </div>
        </div>
      </div>


    </div>
  </x-slot>
</x-layouts.panel>