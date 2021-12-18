@extends('pages.layout')

@section('content')

<!-- Main Content-->
<h5>Главная страница</h5>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">

        @foreach($posts as $post)
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h6 class="post-subtitle">{{$post->preview}}</h6>
                <p>{{$post->content}}</p>
                <p class="post-meta">
                    Автор:
                    <a href="#">{{$post->user_id}}</a>
                    Опубликовано: {{$post->created_at}}
                </p>
                    <hr class="my-4" />
        @endforeach
        </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary text-uppercase" href="#">Older Posts</a>
            </div>
        </div>
    </div>

@endsection