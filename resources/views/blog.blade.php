@include('user.head')
@include('user.navbar')

<section class="mb-5" style="margin-top: 150px">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <h1>{{ $posts->title }}</h1>
                <p>
                    By. <a class="text-decoration-none"
                        href="/authors/{{ $posts->author->username }}">{{ $posts->author->name }}</a> in
                    <a class="text-decoration-none"
                        href="/posts?category={{ $posts->category->slug }}">{{ $posts->category->name }}</a>
                </p>
                <div class="sharethis-inline-share-buttons"></div>
                @if ($posts->image)
                    <div style="max-height: 600px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $posts->image) }}" alt="" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts->category->name }}" alt=""
                        class="img-fluid">
                @endif

                <p class="mt-3">{!! $posts->content !!}</p>
    
                @auth
                <div class="card mt-5 col-md-4">
                    <h5 class="card-header"> Leave a comment</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Your Comment</label>
                                <input type="text" class="form-control" id="comment" name="comment">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                
                
                @endauth
                @foreach ($comments as $c)
                @if ( $posts->id == $c->post_id)
                <div class="media mt-5">
                    <div class="media-body">
                        <h5 class="mb-0">Comment by : {{ $c->name }}</h5>
                        <small>{{ $c->comment }}</small>
                    </div>
                </div>
                
                @endif
                @endforeach
            </div>

        </div>
    </div>
</section>

@include('user.foot')
