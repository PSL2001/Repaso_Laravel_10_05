<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles Tienda ({{($tienda->id)}})</x-slot>
    <div class="card m-auto" style="width: 24rem;">
        <div class="card-body">
          <h5 class="card-title">{{$tienda->nombre}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$tienda->direccion}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">({{$tienda->localidad}})</h6>
          <p class="card-text">{{$tienda->email}}</p>
          <div class="mt-2">
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i> Volver</button>
          </div>
        </div>
      </div>
</x-plantilla>
