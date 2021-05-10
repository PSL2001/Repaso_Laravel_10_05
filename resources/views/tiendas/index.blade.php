<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Gestion de las Tiendas del Sur</x-slot>
    <a href="{{route('tiendas.create')}}" class="btn btn-success mt-2"><i class="fas fa-plus"></i> Crear tienda</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Detalle</th>
      <th scope="col">Nombre</th>
      <th scope="col">Localidad</th>
      <th scope="col" colspan="2">Acciones</th>
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
      <td>boton editar</td>
      <td>boton borrar</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-2">
    {{$tiendas->links()}}
</div>
</x-plantilla>