@extends("assets.layout")

@section('title', 'تعديل عنصر')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('employees.update', ['employee' => $dataEmp->id] ) }}" method="POST" role="form">
        {{ csrf_field() }}
         
        @method('PUT')
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة موظف جديد</legend>
            <div class="form-group row  col-sm-10">
                <label for="marble-name"  class="col-sm-2">إسم الموظف</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="empName" value="{{ $dataEmp->name }}" id="marble-name" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2">الراتب باليوم</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="empSalary" value="{{ $dataEmp->salary_per_day }}" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2">الوظيفة</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="empJob" value="{{ $dataEmp->job }}" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <input type="submit" value="تعديل" name="submit" class="btn btn-primary">
            </div>
        </div>
        
    </form>

@endsection