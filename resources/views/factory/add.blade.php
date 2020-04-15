@extends("assets.layout")

@section('title', 'أضافة عنصر')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('factories.store') }}" method="post" role="form">
        {{ csrf_field() }}
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة عنصر جديد</legend>
            <div class="form-group row  col-sm-10">
                <label for="marble-name" class="col-sm-2">نوع الرخام</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="marbleType" id="marble-name" autocomplete="off">
                </div>
            </div>
            <div class="form-group row  col-sm-10">
                <label for="marble-name" class="col-sm-2">اللون</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="marbleColor" id="marble-color" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2">السعر</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="marblePrice" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <input type="submit" value="حفظ" name="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
    <div class="container col-3">
        @foreach($errors->all() as $err)
        <div class="alert alert-danger"> {{ $err }} </div>
        @endforeach
    </div>

@endsection