@extends('pages.layout')

@section('content')
    <div class="container">
    <!-- Main Content-->
    <h6>Страница со всеми статьями</h6>
        <br/>
    <div class="row justify-content-between">
        <div class="col-8">
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    {{ csrf_field() }}
                        @foreach($posts as $post)
                            <div class="post-preview">
                                <h2 class="post-title">{{$post->title}}</h2>
                                <h6 class="post-subtitle">{{$post->preview}}</h6>
                                <p>{{$post->content}}</p>
                                <p>
                                    <img src="{{ asset('/storage/'.$post->image) }}" alt="image">
                                </p>

                                <p class="post-meta post" id="post{{$post->id}}">
                                    Автор:"
                                    <a href="#">{{$post->getUser($post->user_id)}}</a>
                                    Опубликовано: {{$post->created_at}}
                                    @if ($post->is_private ==1)
                                        <span class="badge bg-info text-dark"> Приватный</span>
                                    @else
                                        <span class="badge bg-info text-dark">Публичный</span>
                                    @endif

                                    <a href="{{ route('opencomment', $post->user_id) }}">
                                        <button type="button" class="btn btn-primary">Написать автору</button></a>

                                </p>

                                <br/>
                            </div>
                        @endforeach
                    </div>
        <div class="col-4">
            <p>Новых сообщений: {{$count_unread}}</p>

            <div>
                <h5>Список контактов</h5>
            @foreach($contacts as $contact)
                    <p><a href="mailto:{{$contact['email']}}">{{$contact['email']}}</a>
                        </p>
                @endforeach
            </div>
                </div>
            </div>
        </div>

@endsection
