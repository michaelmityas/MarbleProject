@extends("assets.layout")

@section('title', 'تعديل عنصر')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

<form action="{{ url('/updateFac/' . $data->id ) }}" method="post" role="form">
    @csrf
    <div class="container text-right" style="color: white">
        <legend class="mb-4">تعديل العنصر</legend>
        <div class="form-group row  col-sm-10">
            <label for="marble-name" class="col-sm-2">النوع</label>
            <div class="float-left">
                <input type="text" class="form-control" name="marbleType" value="{{ $data->type }}" id="marble-name" autocomplete="off">
            </div>
        </div>
        <div class="form-group row  col-sm-10">
            <label for="marble-name" class="col-sm-2">اللون</label>
            <div class="float-left">
                <input type="text" class="form-control" name="marbleColor" value="{{ $data->color }}" id="marble-color" autocomplete="off">
            </div>
        </div>
        <div class="form-group row col-sm-10">
            <label for="marble-price" class="col-sm-2">سعر الرخام</label>
            <div class="float-left">
                <input type="text" class="form-control" name="marblePrice" value="{{ $data->price }}" id="marble-price" autocomplete="off">
            </div>
        </div>
        <div class="form-group row col-sm-10">
            <input type="submit" value="تعديل" name="submit" class="btn btn-primary">
        </div>
        </div>
</form>

@endsection