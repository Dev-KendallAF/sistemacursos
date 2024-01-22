<x-layouts.panel  headerName="Curso" index='5'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="{{route('categoria.index')}}" >Curso /</a>
        <a href="#" class="active" >Nuevo</a>


        
        <h1>Crear Curso</h1>
      </div>
      
      <!--data-->
      <div class="">
     
        <div class="dashboard__data">
          <div>
            <a href="{{route('categoria.index')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
            <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
          </div>
          <hr class="my-3">

          <form action="{{route('categoria.store') }}" method="POST">
            @csrf
            <!--nombre-->
            <div class="form-group @error('nombre') invalid @enderror">
              <label for="txt_nombre" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-regular fa-user text-indigo-600 "></i> Nombre Curso</label>
              <input type="text" name="nombre" id="txt_nombre" mask="char" placeholder="Ingresa el nombre de la Curso"  value="{{old('nombre')}}" autocomplete="off" >
              @error('nombre')
              <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
              @enderror
            </div>
            <span class="text-gray-500 text-xs">Una vez que crees esta Curso puedes clasificar los cursos disponibles en este grupo</span>
          </div>
          <div class="grid items-center">
            <button type="submit" class="rounded-xl bg-indigo-600 w-100 my-2 p-2  shadow-md shadow-indigo-500/50 text-white  ">
              Crear nuevo grupo
            </button>
          </div>
          </div>

          </form>
         


    </div>
  </x-slot>
</x-layouts.panel>