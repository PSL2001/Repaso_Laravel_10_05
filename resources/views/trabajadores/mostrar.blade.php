<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles Trabajador ({{($trabajadore->id)}})</x-slot>
    <div class="card m-auto" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title">{{$trabajadore->apellidos.", ".$trabajadore->nombre}}</h4>
          <h6 class="card-subtitle mb-2 text-muted">{{$trabajadore->email}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">Tienda:
              <a href="{{route('tiendas.show', $trabajadore->tienda->id)}}">
              {{$trabajadore->tienda->nombre}}</a></h6>
          <p class="card-text"><b>Localidad: </b>{{$trabajadore->tienda->localidad}}</p>
          <p class="card-text">
          </p>
          <div class="mt-2">
            <button class="ml-3 btn btn-primary" onclick="window.history.back();">
                <i class="fas fa-backward"></i> Volver</button>
          </div>
        </div>
      </div>
</x-plantilla>
