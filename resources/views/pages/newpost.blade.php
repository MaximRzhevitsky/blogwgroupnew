@extends('pages.layout')

@section('content')
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
  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Название статьи</label>




    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" placeholder="Название">
    </div>
  </div>
<br/>
  <div class="form-group row">
    <label for="preview" class="col-sm-2 col-form-label">Превью</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="preview" placeholder="Превью">
    </div>
  </div>

    <div class="form-group row">
        <label for="user_id" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
{{--            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
        </div>
    </div>
<br/>
    <div class="form-group row">
        <label for="content" class="col-sm-2 col-form-label">Текст</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="content" placeholder="Текст"></textarea>
        </div>
    </div>
<br/>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Тип поста</legend>
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

<br/>
    <div class="col-md-6">
        <input type="file" name="image" class="form-control">
    </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
  </div>
</form>
            </div>
        </div>
    </div>
@endsection
