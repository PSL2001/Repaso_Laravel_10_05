<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tiendas del Sur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('tiendas.index')}}"><i class="fas fa-cogs"></i> Gestionar Tiendas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('trabajadores.index')}}"><i class="fas fa-cogs"></i> Gestionar Trabajadores</a>
          </li>
      </ul>
    </div>
  </div>
</nav>
