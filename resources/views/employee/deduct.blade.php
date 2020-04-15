@extends("assets.layout")

@section('title', 'إضافة خصم')

@section('header')
@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('employees.storeDeduct') }}" method="post" role="form">
        @csrf
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة خصم</legend>
            <div class="form-group row  col-sm-10">
                <label for="marble-name" class="col-sm-2">إسم الموظف</label>
                <div class="float-left">
                    <select name="employee" id="employee" class="form-control">
                        @foreach($employees as $emp)
                        <option value="{{ $emp->id }}"  class="form-control">{{ $emp->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2">المبلغ</label>
                <div class="float-left">
                    <input type="number" class="form-control" name="amount" id="amount"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <input type="submit" value="إضافة" name="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
    <div class="container col-3">
</div>

@endsection