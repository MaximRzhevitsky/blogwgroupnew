@extends('pages.layout')

@section('content')
    <!-- Main Content-->
    <h5>Мои статьи</h5>
    <div class="container px-5 px-lg-6">
        <div class="row gx-5 gx-lg-6 justify-content-center">
                <!-- Post preview-->
                <div class="post-preview">

                    @foreach($posts as $post)
                        <h2 class="post-title">{{$post->title}}</h2>
                        <h6 class="post-subtitle">{{$post->preview}}</h6>
                        <p>{{$post->content}}</p>

                    <p>
                        <img src="{{ asset('/storage/'.$post->image) }}" alt="image">
                    </p>
                        <p class="post-meta">
                            Опубликовано: {{$post->created_at}}
                        </p>
                    @if($post->is_private ==1)
                        <span class="badge bg-info text-dark"> Приватный</span>
                        @else
                            <span class="badge bg-info text-dark">Публичный</span>
                        @endif

                        @if ($post->status == 2)
                                <h5>Этот пост отклонен модератором</h5>
                                Причина:{{$post->notice}}
                                <br/>
                                <a href="{{route('editpost',$post->id)}}">
                                    <button type="button" class="btn btn-secondary btn-sm">Редактировать</button></a>
                        @endif

                        <a href="{{route('deletepost',$post->id)}}">
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button></a>

                        <hr class="my-4" />
                        <br/>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

