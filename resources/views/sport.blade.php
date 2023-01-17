@include('user.head')
@include('user.navbar')

{{-- SECOND NAVBAR --}}
<nav class="navbar second-nav navbar-expand-lg"
    style="background-color: blue; border-bottom: black 3px solid; margin-top: 100px">
    <div class="container d-flex flex-column align-items-start">
        <a class="navbar-brand gap-2 d-flex flex-row" href="#">
            <div>
                <p class="mb-0">SPORTS</p>
            </div>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        </div>
    </div>
</nav>
{{-- END SECOND NAVBAR --}}

{{-- HOMESECTION SPORT --}}
{{-- <section class="second-section mt-4">
  <div class="container">
      <div class="row">
          <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 ">
              @foreach ($sports as $sport)
              <div class="card">
                  <div class="content">
                      <p>{{$sport->title}}</p>
                  </div>
              </div>
                  
              @endforeach
          </div>
          <div class="mt-4">
            {{$sports -> links()}}
          </div>
      </div>
  </div>
</section> --}}
{{-- END HOME SECTION SPORT --}}

<section class="main-section" style="margin-top: 50px">
    <div class="container">
        <div class="row">
            @if ($posts->count())

                @foreach ($posts as $p)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="kategori position-absolute p-2 px-3 ">
                                <a class="text-decoration-none" href="/posts?category={{ $p->category->slug }}">
                                    <small>{{ $p->category->name }}</small>
                                </a>
                            </div>
                            @if ($p->image)
                                <div style="max-height: 350px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $p->image) }}" alt=""
                                        class="img-fluid mt-3">
                                </div>
                            @else
                                <img class="card-img-top"
                                    src="https://source.unsplash.com/600x400?{{ $p->category->name }}"
                                    alt="{{ $p->category->name }}">
                            @endif
                            <div class="card-body">
                                <a class="judul text-decoration-none " href="/posts/{{ $p->slug }}">
                                    <h5 class="card-title">{{ $p->title }}</h5>
                                </a>
                                <p>
                                    <small class="text-muted">
                                        By. <a class="text-decoration-none"
                                            href="/authors/{{ $p->author->username }}">{{ $p->author->username }}</a>
                                        {{ $p->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $p->excerpt }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated {{ $p->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                <h1>No Post Found</h1>
            @endif
        </div>
    </div>
</section>

@include('user.foot')
