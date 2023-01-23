<div class="menu">
    <nav class="navbar navbar-expand-md navbar-dark{{--fixed-top--}}">
        <a class="navbar-brand" href="/">FIESC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{(request()->is('/')) ? 'active' : ''}}">
              <a class="nav-link" href="{{route('home')}}">Pessoa</a>
            </li>
            <li class="nav-item {{(request()->is('conta')) ? 'active' : ''}}">
              <a class="nav-link" href="{{route('conta')}}">Conta</a>
            </li>
            <li class="nav-item {{(request()->is('movimentacao')) ? 'active' : ''}}">
                <a class="nav-link" href="{{route('movimentacao')}}">Movimentação</a>
              </li>
            {{-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> --}}
          </ul>
        </div>
      </nav>
</div>