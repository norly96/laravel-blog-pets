<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Stand Blog<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item {{request()->routeIs('pages.home') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('pages.home')}}">Inicio
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item {{request()->routeIs('pages.nosotros') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('pages.nosotros')}}">Nosotros</a>
              </li>
              <li class="nav-item {{request()->routeIs('lista') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('lista')}}">Blog</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('pages.nosotros')}}">Post Details</a>
              </li> --}}
              <li class="nav-item {{request()->routeIs('pages.contacto') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('pages.contacto')}}">Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>