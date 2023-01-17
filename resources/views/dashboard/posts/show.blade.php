@extends('dashboard.layout.main')

@section('container')

<section class="" style="margin-top: 10px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1>{{ $post->title }}</h1>
                <div class="d-flex gap-3">
                    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my post</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method("delete")
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
                      </form>
                </div>
                @if ($post->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' .$post->image) }}" alt="" class="img-fluid mt-3">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="" class="img-fluid mt-3">
                @endif
                <p class="mt-3">{!! $post->content !!}</p>
            </div>
        </div>
    </div>
</section>

@endsection 