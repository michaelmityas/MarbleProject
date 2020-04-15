@extends("assets.layout")

@section('title', 'المصروفات')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('expenses.store') }}" method="post" role="form">
        @csrf
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة مصروفات</legend>
            <div class="form-group row col-sm-10">
                <label for="serviceType" class="col-sm-2">نوع المصروفات</label>
                <div class="float-left">
                    <select class="custom-select form-control" name="serviceType" id="serviceType">
                        <option selected>اختر نوع المصروفات</option>
                        <option value="صيانة">صيانة</option>
                        <option value="مصروفات عمال">مصروفات عمال</option>
                        <option value="قبض موظفين">قبض موظفين</option>
                        <option value="أخرى">أخرى</option>
                    </select>
                </div>
            </div>
            <div class="form-group row  col-sm-10">
                <label for="cost" class="col-sm-2">التكلفة</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="cost" id="cost" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <input type="submit" value="حفظ" name="submit" class="btn btn-primary">
            </div>
        </div>
    </form>

@endsection