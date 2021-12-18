@extends('pages.layout')

@section('content')
    <h3>Редактирование статьи</h3>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

<form method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="post_id" value="{{$post->id}}">

  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Название статьи</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title"  value="{{$post->title}}">
    </div>
  </div>
<br/>

    <div class="form-group row">
        <label for="preiew" class="col-sm-2 col-form-label">Превью</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="preview" value="{{$post->preview}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="content" class="col-sm-2 col-form-label">Текст</label>
        <div class="col-sm-10">
            <textarea style="width:800px; height:200px;" class="form-control" name="content">{{$post->content}}</textarea>
        </div>
    </div>

    <div class="form-group row">
  <fieldset>
    <div class="row">
        <label for="content" class="col-sm-2 col-form-label">Тип поста</label>
      <div class="col-sm-10">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="is_private" id="Radio1" value="1">
                <label class="form-check-label" for="Radio1">Приватный</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="is_private" id="Radio2" value="0">
                <label class="form-check-label" for="Radio2">Публичный</label>
            </div>
      </div>
    </div>
  </fieldset>
  </div>

         <br/>
          <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Картинка</label>
              <div class="col-sm-10">
                  <img src="{{ asset('/storage/'.$post->image) }}" alt="image">
              </div>
          </div>
        <br/>

<div class="row">
  <div class="form-group row">
      <label for="image" class="col-sm-2 col-form-label">Новая картинка</label>
      <div class="col-md-6">
          <input type="file" name="image" class="form-control">
      </div>
      <br/>
      <br/>
      <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
  </div>
  </div>

</form>
            </div>
            </div>
            </div>
    </div>
@endsection
