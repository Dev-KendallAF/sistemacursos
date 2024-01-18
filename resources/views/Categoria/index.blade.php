@php $hName='categorias' @endphp

<x-layouts.panel  headerName="{{$hName}}" index='5'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="#" class="active">{{$hName}} /</a>
        
        <h1><i class="fa-solid fa-chalkboard-user fa-xs"></i>
          {{$hName}}</h1>

          
            <a href="{{route('categoria.create')}}" class="font-semibold text-sm rounded-lg mt-5 inline-block bg-indigo-500 p-2 shadow-md shadow-indigo-500/50 hover:bg-indigo-600 text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"><i class="fa-solid fa-plus"></i> Crear Nuevo </a>

          

          @if ( session('success') )
          <div class="bg-green-300 dark:bg-green-500 p-3 mt-5 rounded-lg shadow-xl transition ease-in font-semibold dark:text-white ">
            <i class="fa-regular fa-circle-check fa-bounce"></i>
            {{session('success')}}
          </div>
          @endif
         
      </div>
      
      <!--table-->
      <div class="dashboard__table">
        <table id="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nombre Categoria</th>
                  <th>Fecha modificación</th>
                  <th>Estado</th>

                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($categorias as $p)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td data-label="ID" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $p->id }}</td>
                      <td data-label="Nombre Categoria">{{ $p->nombre }}</td>
                      <td data-label="Fecha modificación">{{ $p->updated_at }}</td>
                      <td data-label="Estado" class="estado {{ $p->estado == 1 ? 'estado__activo' : 'estado__inactivo' }}">
                        {{ $p->estado == 1 ? 'Activo' : 'Inactivo' }}
                    </td>
                                          <td data-label="Acciones" class="action">
                          <a href="{{ route('categoria.show', $p) }}"><i class="fa-regular fa-eye"></i></a>
                          <a href="{{ route('categoria.edit', $p) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      </div>


    </div>
  </x-slot>
</x-layouts.panel>