<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Gestion de las Tiendas del Sur</x-slot>
    <x-mensajes/>
    <a href="{{route('tiendas.create')}}" class="btn btn-success mt-2"><i class="fas fa-plus"></i> Crear tienda</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Detalle</th>
      <th scope="col">Nombre</th>
      <th scope="col">Localidad</th>
      <th scope="col" colspan="2" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($tiendas as $item)
    <tr>
      <th scope="row">
        <a href="{{route('tiendas.show', $item)}}" class="btn btn-info"><i class="fas fa-info"></i> Detalles</a>
      </th>
      <td>{{$item->nombre}}</td>
      <td>{{$item->localidad}}</td>
      <td class="text-center">
          <a href="{{route('tiendas.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
      </td>
      <td class="text-center">
        <form name="ad" method="POST" action="{{route('tiendas.destroy', $item)}}">
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
    {{$tiendas->links()}}
</div>
</x-plantilla>
