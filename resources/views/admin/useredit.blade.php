@extends('admin.admin_layout')

@section('content')

    <div class="content">
        <div class="container">
<h3>Редактирование автора</h3>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <form method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="" value="{{$user->name}}">
                    </div>
                </div>
                <br/>

                <div class="form-group row">
                    <label for="birthday" class="col-sm-2 col-form-label">Днюха</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="birthday" placeholder="" value="{{$user->birthday}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-sm-2 col-form-label">Пол</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="gender" placeholder="" value="{{$user->gender}}">
                    </div>
                </div>
                <br/>

                <div class="form-group row">
                    <label for="country" class="col-sm-2 col-form-label">Страна</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="country" placeholder="" value="{{$user->country}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">Город</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="city" placeholder="" value="{{$user->city}}">
                    </div>
                </div>
                <br/>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Почта</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" placeholder="" value="{{$user->email}}">
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$user->id}}">

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
