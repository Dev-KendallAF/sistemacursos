<x-layouts.panel  headerName="Categoria" index='5'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="{{route('categoria.index')}}" >Categoria /</a>
        <a href="{{route('categoria.show', $categoria->id) }}" >ver /</a>
        <a href="#" class="active">editar /</a>


        
        <h1>
          {{$categoria->nombre}}</h1>
      </div>
      
      <!--data-->
      <div class="">
       
        <div class="dashboard__data">
          <div>
            <a href="{{route('categoria.show', $categoria )}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
            <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
          </div>
          <hr class="my-3">

          <form action="{{route('categoria.update', $categoria ) }}" method="POST">
            
            @method('PUT')
            @csrf
            <!--nombre-->
            <div class="form-group @error('nombre') invalid @enderror">

          <div class="grid grid-cols-2 gap-4">


            <!-- Nombre -->
            <div>
            <label for="txt_nombre" class="dark:text-indigo-500">Nombre Categoría</label>
              <input type="text" name="nombre" id="txt_nombre" mask="char" placeholder="Ingresa el nombre categoría"  value="{{$categoria->nombre}}" autocomplete="off" >
            @error('nombre')
            <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
            @enderror
            </div>
            <!-- Estado -->
            <div class="switch ml-10" id="switch_estado" data-estado="{{$categoria->estado}}">
              <input type="hidden" name="estado" id="txt_estado" class="txt_estado" value="{{$categoria->estado}}">
              <p class=""><i class="fa-solid fa-circle-check text-indigo-600"></i> Estado</p>
                <div class="switch__items" id="switch__items">
                      <div class="relative">
                          <div class="switch__background"></div>
                          <div class="switch__check cursor-pointer"></div>
                      </div>
                      <div class="switch__label" id="lb_estado">Activo</div>
              </div>
            </div>
          </div>
          <div class="grid items-center">
            <button type="submit" class="rounded-xl bg-indigo-600 w-100 my-2 p-2  shadow-md shadow-indigo-500/50 text-white  ">
              Realizar Cambios
            </button>
          </div>
          </div>

          </form>
         


    </div>
  </x-slot>
</x-layouts.panel>