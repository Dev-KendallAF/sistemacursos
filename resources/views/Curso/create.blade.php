<x-layouts.panel  headerName="Curso" index='3'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="{{route('curso.index')}}" >Curso /</a>
        <a href="#" class="active" >Nuevo</a>


        
        <h1>Crear Curso</h1>
      </div>
      
      <!--data-->
      <div class="">
     
        <div class="dashboard__data">
          <div>
            <a href="{{route('curso.index')}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
            <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
          </div>
          <hr class="my-3">

          <form action="{{route('curso.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-6">
              <!--Datos Personales-->
              <div>
                 <!--Nombre-->
                  <div class="form-group @error('nombre') invalid @enderror">
                    <label for="txt_nombre" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-regular fa-user text-indigo-600 "></i> Nombre Curso</label>
                    <input type="text" name="nombre" id="txt_nombre"  placeholder="Ingresa el nombre del Curso"  value="{{old('nombre')}}" autocomplete="off" >
                    @error('nombre')
                    <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                    @enderror
                  </div>

                  <!--Categoria-->
                  <div class="form-group @error('categoria_id') invalid @enderror">
                    <label for="slc_categoria" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-solid fa-book-open text-indigo-600 "></i> Categor&iacute;a</label>
                    <select  name="categoria_id" id="slc_categoria"    autocomplete="off" >
                      <option value="0" default>Selecciona una Categoría</option>
                     
                      @foreach ($categorias as $c)
                          <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                      @endforeach
                    </select>
                    @error('categoria_id')
                    <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                    @enderror
                  </div>

                    <!--Profesor-->
                    <div class="form-group @error('profesor_id') invalid @enderror">
                      <label for="slc_profesor" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-solid fa-chalkboard-user text-indigo-600 "></i> Profesor</label>
                      
                      <select  name="profesor_id" id="slc_profesor"    >
                        <option value="0" default>Asigna un Profesor</option>
                       
                        @foreach ($profesores as $p)
                            <option value="{{ $p->id }}">{{ $p->nombreCompleto }}</option>
                        @endforeach
                      </select>

                      @error('profesor_id')
                      <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                      @enderror
                    </div>
              </div>

              <div>
                  <!--Descripcion-->
                  <div class="form-group @error('descripcion') invalid @enderror">
                    <label for="txt_descripcion" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-regular fa-rectangle-list text-indigo-600 "></i> Descripci&oacute;n</label>
                    <textarea type="text" name="descripcion" id="txt_descripcion" maxlength="250"  placeholder="Describe tu curso" class="textarea" rows="5" >{{old('descripcion')}}</textarea>
                    <div class="count "><span class="char">0</span>/<span class="max">250</span></div>
                    @error('descripcion')
                    <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                    @enderror
                  </div>  
              </div>
            </div>
           
            <span class="text-gray-500 text-xs">Una vez que crees este Curso puedes clasificar por categoría</span>
          </div>
          <div class="grid items-center">
            <button type="submit" class="rounded-xl bg-indigo-600 w-100 my-2 p-2  shadow-md shadow-indigo-500/50 text-white  ">
              Crear nuevo Curso
            </button>
          </div>
          </div>

          </form>
         


    </div>
  </x-slot>
</x-layouts.panel>