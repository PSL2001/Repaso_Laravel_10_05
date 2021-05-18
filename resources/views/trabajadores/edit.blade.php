<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Editar trabajador</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{route('trabajadores.update', $trabajadore)}}" class="p-4 bg-secondary text-light">
        @csrf
        @method('PUT')
        @bind($trabajadore)
        <x-form-input name="nombre" label="Nombre Trabajador" />
        <x-form-input name="apellidos" label="Apellidos Trabajador" />
        <x-form-input name="email" label="E-mail" type="mail" />
        <x-form-select name="tienda_id" :options="$misTiendas" label="Tienda" />
        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Actualizar</button>

            <button type="reset" class="ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i> Volver</button>
        </div>
    </form>
</x-plantilla>
