<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles Tienda ({{($tienda->id)}})</x-slot>
    <div class="card m-auto" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title">{{$tienda->nombre}}</h4>
          <h6 class="card-subtitle mb-2 text-muted">{{$tienda->direccion}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">({{$tienda->localidad}})</h6>
          <p class="card-text"><b>Email: </b>{{$tienda->email}}</p>
          <p class="card-text">
              <b>Trabajadores</b>
              <ul>
                  @foreach ($tienda->trabajadores as $item)
                      <li><a href="{{route('trabajadores.show', $item)}}">
                        {{$item->apellidos.", ".$item->nombre}}</a></li>
                  @endforeach
              </ul>
          </p>
          <div class="mt-2">
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i> Volver</button>
          </div>
        </div>
      </div>
</x-plantilla>
