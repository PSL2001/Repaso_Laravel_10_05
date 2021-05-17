<x-plantilla>
    <x-slot name="titulo">Trabajadores</x-slot>
    <x-slot name="cabecera">Gestion de los Trabajadores</x-slot>
    <x-mensajes/>
    <a href="{{route('trabajadores.create')}}" class="btn btn-success mt-2"><i class="fas fa-plus"></i> Crear trabajador</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Detalle</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="2" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($trabajadores as $item)
    <tr>
      <th scope="row">
        <a href="{{route('trabajadores.show', $item)}}" class="btn btn-info"><i class="fas fa-info"></i> Detalles</a>
      </th>
      <td>{{$item->apellidos}}</td>
      <td>{{$item->nombre}}</td>
      <td>{{$item->email}}</td>
      <td class="text-center">
          <a href="{{route('trabajadores.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
      </td>
      <td class="text-center">
        <form name="ad" method="POST" action="{{route('trabajadores.destroy', $item)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-2">
    {{$trabajadores->links()}}
</div>
</x-plantilla>
