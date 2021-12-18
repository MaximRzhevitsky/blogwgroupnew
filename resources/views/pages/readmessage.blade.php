@extends('pages.layout')

@section('content')
    <!-- Main Content-->
    <h5>Сообщения</h5>

    {{ csrf_field() }}
    <div class="container px-5 px-lg-6">
        <div class="row gx-5 gx-lg-6 justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-7">
                <!-- Post preview-->
                    @foreach($messages as $message)
                        <div class="post-preview">

                        <p>{{$message->text}}</p>
                            Автор:"
                            <a href="#">{{$message->getUser($message['id'])}}</a>
                            Опубликовано: {{$message->created_at}}


                           <p> <a href="{{ route('opencomment', $message->sender_id) }}">
                                <button type="button" class="btn btn-primary">Ответить</button></a>
                        </p>

                        <br/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
