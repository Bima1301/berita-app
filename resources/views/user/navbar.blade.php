<nav class="navbar first-nav navbar-expand-lg">
    <div class="container mx-auto px-20">
        <a class="navbar-brand gap-2 d-flex flex-row" href="/">
          <div>
            <p class="mb-0">NEWS</p>
          </div>
          <div>
            <p class="mb-0">SOON</p>
          </div>
        </a>

        
        @auth
        <ul class="mb-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              @can('admin')
              <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
              @endcan
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
        @else
        <a class="text-decoration-none d-flex flex-row gap-2 {{ ($active === "login") ? 'active' : '' }}" href="/login">
          <img src="assets/user.svg" alt="">
          <p class="mb-0 text-black font-bold">Login</p>
        </a>
        @endauth

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <img class="icon-navbar" src="/assets/toggler.svg"></img>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav m-sm-auto my-sm-4">
              <a style="border-left: solid 1px rgba(0, 0, 0, 0.274)" class="me-4"></a>
                <a class="nav-link ms-4 {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
                <a class="nav-link ms-4 {{ ($active === "social") ? 'active' : '' }}" href="/posts?category=social">Social</a>
                <a class="nav-link ms-4 {{ ($active === "sport") ? 'active' : '' }}" href="/posts?category=sport">Sport</a>
                {{-- <a class="nav-link ms-4 {{ Request::is('authors/') ? 'active' : '' }}" href="/authors/">Author</a> --}}
              </div>
              <form class="d-flex"  action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input class="form-control me-2" type="text" placeholder="Search News" aria-label="Search" name ="search" value="{{ request('search') }}">
                <button class="btn btn-outline-dark" type="submit">Search</button>
              </form>
        </div>
    </div>
</nav>



