<x-layouts.panel  headerName="Categorias" index='5'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="{{route('categoria.index')}}" >Categorias /</a>
        <a href="#" class="active">ver /</a>

        
        <h1>
          {{$categoria->nombreCompleto}}</h1>
      </div>
      
      <!--data-->
      <div class="">
        <div class="dashboard__data">
          <div>
            <a href="{{route('categoria.index')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
            <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
          </div>
          <hr class="my-3">
          <div>
            <h2>Nombre Categoría:</h2>
            <p>{{$categoria->nombre}}</p>
          </div>
          <div>
            <h2>Fecha Creación:</h2>
            <p>{{$categoria->updated_at}}</p>
          </div>
          <div>
            <a href="#" class="text-sm font-semibold text-indigo-400 transition ease-in hover:underline hover:underline-offset-4">Cursos activos con esta categoría</a>
          </div>

          <div>
            <a href="{{route('categoria.edit', $categoria->id) }}" class="text-sm font-semibold text-indigo-400 transition ease-in hover:underline hover:underline-offset-4"> Modificar Categoria</a>
          </div>
        </div>
      </div>


    </div>
  </x-slot>
</x-layouts.panel>