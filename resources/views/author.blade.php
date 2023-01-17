@include('user.head')
@include('user.navbar')

<section style="margin-top: 100px">
    <div class="container">
        <div class="row mt-5">
            <h1 class="mb-5">Post By Author : {{ $title }}</h1>
            @foreach ($posts as $p)
                <h1>
                    <a class="text-decoration-none" href="/posts/{{ $p->slug }}">{{ $p->title }}</a>
                </h1>
                <p>
                    By. <a class="text-decoration-none" href="/authors/{{ $p->author->username }}">{{ $p->author->name }}</a> in 
                    <a class="text-decoration-none" href="/categories/{{ $p->category->slug }}">{{ $p->category->name }}</a>
                </p>
                <p>{{ $p->excerpt }}</p>
            @endforeach
        </div>
    </div>
  </section>

@include('user.foot')