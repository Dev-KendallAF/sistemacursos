<x-layouts.panel  headerName="Profesores" index='2'>
  <x-slot name="content">
    <div class="continer mx-auto ">
      <!--history-->
      <div class="historyLink">
        <a href="#" class="active">Profesores /</a>
        
        <h1><i class="fa-solid fa-chalkboard-user fa-xs"></i>
          Profesores</h1>
      </div>
      
      <!--table-->
      <div class="dashboard__table">
        <table id="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nombre Completo</th>
                  <th>Identificación</th>
                  <th>Email</th>
                  <th>Fecha modificación</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($profesores as $p)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td data-label="ID" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $p->id }}</td>
                      <td data-label="Nombre Completo">{{ $p->nombreCompleto }}</td>
                      <td data-label="Identificación">{{ $p->identificacion }}</td>
                      <td data-label="Email">{{ $p->email }}</td>
                      <td data-label="Fecha modificación">{{ $p->updated_at }}</td>
                      <td data-label="Acciones" class="action">
                          <a href="{{ route('teacher.show', $p) }}"><i class="fa-solid fa-user-large"></i></a>
                          <a href="{{ route('teacher.edit', $p) }}"><i class="fa-solid fa-user-pen"></i></a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      </div>


    </div>
  </x-slot>
</x-layouts.panel>