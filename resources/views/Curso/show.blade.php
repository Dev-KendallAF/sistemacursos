<x-layouts.panel  headerName="Curso" index='5'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="{{route('curso.index')}}" >Curso /</a>
        <a href="#" class="active">ver /</a>

        
        <h1>
          {{$curso->nombre}}</h1>
      </div>
      
      <!--data-->
      <div class="">
        <div class="dashboard__data">
          <div>
            <a href="{{route('curso.index')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
            <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
          </div>
          <hr class="my-3">
          <h2 class="font-semibold text-sm">Descripcion:</h2>

          <div class="px-2 py-5 border border-gray-300 rounded-xl">
            <p class="text-sm text-gray-500">{{$curso->descripcion}}</p>
          </div>
          <div>
            <h2>Profesor asignado:</h2>
            <p>{{$profesor->nombreCompleto}}</p>
          </div>

        
          <div>
            <h2>Fecha Creación:</h2>
            <p>{{$curso->updated_at}}</p>
          </div>
          <div>
            <a href="#" class="text-sm font-semibold text-indigo-400 transition ease-in hover:underline hover:underline-offset-4">Estudiantes Inscritos a este Curso</a>
          </div>

          <div>
            <a href="{{route('curso.edit', $curso->id) }}" class="text-sm font-semibold text-indigo-400 transition ease-in hover:underline hover:underline-offset-4"> Modificar curso</a>
          </div>
        </div>
      </div>


    </div>
  </x-slot>
</x-layouts.panel>