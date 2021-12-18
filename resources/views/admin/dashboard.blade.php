@extends('admin.admin_layout')

@section('content')

        <!-- Main content -->

        <div class="content">
            <div class="container">
                <h4>Статьи</h4>
                <table class="table table-bordered">
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>Номер</th>
                            <td>{{$post->id}}</td></tr>
                        <tr>
                            <th>Название</th>
                            <td>{{$post->title}}</td></tr>
                        <tr>
                            <th>Превью</th>
                            <td>{{$post->preview}}</td></tr>
                        <tr>
                            <th>Текст</th>
                            <td>{{$post->content}}</td></tr>
                        <tr>
                            <th>Автор</th>
                            <td>{{$post->getUser($post->user_id)}}</td></tr>
                        <tr>
                            <th>Приватность</th>
                            <td>
                                @if ($post->is_private==1)Да
                                @else Нет
                                @endif </td></tr>
                        <tr>
                            <th>Статус</th>
                            <td>
                                @if ($post->status==0) На модерации
                                @elseif ($post->status==1) Опубликован
                                @elseif ($post->status==2) Отправлен автору на корректировку
                                @endif </td></tr>
                        <tr>
                            <th>Картинка</th>
                            <td><img src="{{ asset('/storage/'.$post->image) }}" alt="image">
                        <tr>
                            <th>Дата добавления</th>
                            <td>{{$post->created_at}}</td></tr>
                        <tr>
                            <td colspan="2">
                                <a href="{{route('set_notice',$post->id)}}">
                                    <button type="button" class="btn btn-secondary btn-sm">Замечания</button>
                                </a>

                                <a href="{{route('deletepost',$post->id)}}">
                                    <button type="button" class="btn btn-danger btn-sm">Удалить</button></a>

                                @if ($post->status==0)
                                    <a href="{{route('publicatepost',$post->id)}}"><button type="button" class="btn btn-success">Опубликовать</button></a>
                                @endif </td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr align="left" size="2" width="300" color="black"/></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                </div>
        </div>
@endsection

{
