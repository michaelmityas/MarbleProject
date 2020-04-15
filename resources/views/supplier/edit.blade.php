@extends("assets.layout")

@section('title', 'تعديل مورد')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ url('/updateSup/' . $res->id ) }}" method="post" role="form">
        {{ csrf_field() }}
        <div class="container text-right" style="color: white">
            <legend class="mb-4">تعديل مورد </legend>
            <div class="form-group row col-sm-10">
                <label for="marble-name" class="col-sm-2 col-form-label">أسم المورد</label>
                <div class="float-left">
                    <input value="{{$res->supplier_name}}" type="text" class="form-control" name="supName" id="marble-name" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">نوع الرخام</label>
                <div class="float-left">
                    <input value="{{ $res->marble_type }}" type="text" class="form-control" name="marbleType" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">سعر الرخام</label>
                <div class="float-left">
                    <input value="{{ $res->marble_price }}" type="text" class="form-control" name="marblePrice" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">كود الرخام</label>
                <div class="float-left">
                    <input value="{{ $res->marble_code }}" type="text" class="form-control" name="marbleCode" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label"> المبلغ المدفوع</label>
                <div class="float-left">
                    <input value="{{ $res->paid }}" type="text" class="form-control" name="paid" id="marble-price"  autocomplete="off">
                </div>
            </div>
            <div class="form-group col-sm-10">
                <input type="submit" value="حفظ" name="submit" class="btn btn-primary">
            </div>
        </div>
        <input type="hidden" value="" name="submit" class="btn btn-primary">
    </form>
    <!-- <div class="container col-3">
        @foreach($errors->all() as $err)
        <div class="alert alert-danger"> {{ $err }} </div>
        @endforeach
    </div> -->

@endsection