@include('user.head')
@include('user.navbar')



{{-- FIRST SECTION --}}
{{-- <section class="first-section mt-5">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-wrap justify-content-center align-items-center gap-4">
                @foreach ($posts as $p)
                <a href="/posts/{{ $p->slug }}">
                    <div class="card" style="background-image: url('https://source.unsplash.com/random')">
                        <div class="content">
                            <h2>{{$p->title}}</h2>
                            <p>{{ $p->excerpt }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}
{{-- END FIRST SECTION --}}

<section class="main-section" style="margin-top: 130px">
    <div class="container">
        <div class="row">
            @if ($posts->count())

                @isset($search)
                    <h1 class="mb-5">Hasil Pencarian : " {{ $search }} "</h1>
                @endisset

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
                <div class="">
                    {{ $posts->links() }}
                </div>
            @else
                <h1>No Post Found</h1>
            @endif
        </div>
    </div>
</section>

@include('user.foot')
