@extends('pages.layout')

@section('content')

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

<form method="POST">
    @csrf
    <input type="hidden" name="author_id" value="{{$author_id}}">
    <input type="hidden" name="sender_id" value="{{$sender_id}}">
  <div class="form-group row">
        <div class="col-sm-10">
            <label for="text">Текст</label>
            <textarea class="form-control" name="text" placeholder="Текст"></textarea>
        </div>
</div>
    <br/>
    <br/>
        <button type="submit" class="btn btn-primary">Отправить письмо</button>
            </form>
        </div>
    </div>
    </div>

@endsection
