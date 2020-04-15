@extends("assets.layout")

@section('title', 'أضافة موظف جديد')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('employees.store') }}" method="post" role="form">
        {{ csrf_field() }}
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة موظف جديد</legend>
            <div class="form-group row  col-sm-10">
                <label for="marble-name" class="col-sm-2">إسم الموظف</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="empName" id="marble-name" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2">الراتب باليوم</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="empSalary" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2">الوظيفة</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="empJob" id="marble-price"  autocomplete="off">
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