@extends('admin.admin_layout')

@section('content')

    <div class="content">
        <div class="container">
<h3>Отправка на исправление</h3>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <form method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">Замечание</label>
                    <div class="col-sm-10">
                        <textarea style="width:800px; height:200px;" class="form-control" name="notice">{{$post->notice}}</textarea>
                    </div>
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
</div>
    </div>
@endsection
