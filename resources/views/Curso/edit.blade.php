<x-layouts.panel  headerName="Curso" index='5'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="{{route('curso.index')}}" >Curso /</a>
        <a href="{{route('curso.show', $curso->id) }}" >ver /</a>
        <a href="#" class="active">editar /</a>


        
        <h1>
          {{$curso->nombre}}</h1>
      </div>
      
      <!--data-->
      <div class="">
       
        <div class="dashboard__data">
          <div>
            <a href="{{route('curso.show', $curso )}}"><i class="fa-solid fa-circle-chevron-left mx-2 pb-2 fa-lg text-indigo-600"></i></a>
            <h1 class="inline text-2xl font-bold text-indigo-600" >Regresar</h1>
          </div>
          <hr class="my-3">

          <form action="{{route('curso.update', $curso ) }}" method="POST">
            
            @method('PUT')
            @csrf
            <!--nombre-->
            <div class="form-group @error('nombre') invalid @enderror">

          <div class="grid grid-cols-2 gap-4">

            <div>
              <!-- Nombre -->
              <div  class="form-group @error('nombre') invalid @enderror">
                <label for="txt_nombre" class="dark:text-indigo-500">Nombre Curso</label>
                  <input type="text" name="nombre" id="txt_nombre"  placeholder="Ingresa el nombre Curso"  value="{{$curso->nombre}}" autocomplete="off" >
                @error('nombre')
                <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                @enderror
              </div>
             <!--Categoria-->
             <div class="form-group @error('categoria_id') invalid @enderror">
              <label for="slc_categoria" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-solid fa-book-open text-indigo-600 "></i> Categor&iacute;a</label>
              <select  name="categoria_id" id="slc_categoria"    autocomplete="off" >
                @foreach ($categorias as $c)
                    @if($c->id == $curso->categoria_id)
                    <option value="{{ $c->id }}" selected>{{ $c->nombre }}</option>
                    @else 
                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                    @endif
                @endforeach
              </select>
              @error('categoria_id')
              <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
              @enderror
            </div>
               <!-- Estado -->
              <div class="switch" id="switch_estado" data-estado="{{$curso->estado}}">
                <input type="hidden" name="estado" id="txt_estado" class="txt_estado" value="{{$curso->estado}}">
                <p class=""><i class="fa-solid fa-circle-check text-indigo-600"></i> Estado</p>
                  <div class="switch__items" id="switch__items">
                        <div class="relative">
                            <div class="switch__background"></div>
                            <div class="switch__check"></div>
                        </div>
                        <div class="switch__label" id="lb_estado">Activo</div>
                </div>
              </div>
            </div>
            
             

            
              <div>
                <!--Profesores-->
                <div class="form-group @error('profesor_id') invalid @enderror">
                  <label for="slc_profesor" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-solid fa-chalkboard-user text-indigo-600 "></i> Profesor</label>
                  <select  name="profesor_id" id="slc_profesor"    autocomplete="off" >
                    @foreach ($profesores as $c)

                        @if($c->id == $curso->profesor_id)
                        <option value="{{ $c->id }}" selected>{{ $c->nombreCompleto }}</option>
                        @else 
                        <option value="{{ $c->id }}">{{ $c->nombreCompleto }}</option>
                        @endif
                    @endforeach
                  </select>
                  @error('categoria_id')
                  <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                  @enderror
                </div>

                <!--Descripcion-->
                <div class="form-group @error('descripcion') invalid @enderror">
                  <label for="txt_descripcion" class=" dark:text-indigo-500 error:border-red-500  "> <i class="fa-regular fa-rectangle-list text-indigo-600 "></i> Descripci&oacute;n</label>
                  <textarea type="text" name="descripcion" id="txt_descripcion" maxlength="250"  placeholder="Describe tu curso" class="textarea" rows="5" >{{$curso->descripcion}}</textarea>
                  <div class="count "><span class="char">{{strlen($curso->descripcion)}}</span>/<span class="max">250</span></div>
                  @error('descripcion')
                  <span class="message__error"><i class="fa-solid fa-circle-exclamation fa-fade"></i> {{$message}}</span>
                  @enderror
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