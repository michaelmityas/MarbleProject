@extends("assets.layout")

@section('title', 'تعديل مورد')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ url('/works/updateblockdetails/' . $blockdetails->id ) }}" method="post" role="form">
        {{ csrf_field() }}
        <div class="container text-right" style="color: white">
            <legend class="mb-4">تعديل البلوكة</legend>
            <div class="form-group row col-sm-10">
                <label for="marble-name" class="col-sm-2 col-form-label">أسم المورد</label>
                <div class="float-left">
                    <input value="{{$blockdetails->supplier_name}}" type="text" class="form-control" name="supName" id="marble-name" disabled autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">نوع البلوكة</label>
                <div class="float-left">
                    <input value="{{ $blockdetails->type }}" type="text" class="form-control" name="block_type" id="block_type"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">كود البلوكة</label>
                <div class="float-left">
                    <input value="{{ $blockdetails->block_code }}" type="text" class="form-control" name="block_code" id="block_code" disabled autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">الطول</label>
                <div class="float-left">
                    <input value="{{ $blockdetails->length }}" type="text" class="form-control" name="block_length" id="block_length"   autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">العرض</label>
                <div class="float-left">
                    <input value="{{ $blockdetails->width }}" type="text" class="form-control" name="block_width" id="block_width"   autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">الارتفاع</label>
                <div class="float-left">
                    <input value="{{ $blockdetails->height }}" type="text" class="form-control" name="block_height" id="block_height"   autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">طاولة 2 سم</label>
                <div class="float-left">
                    <input value="<?php echo isset( $blockdetails->count_2cm ) ? $blockdetails->count_2cm: 0; ?>" type="text" class="form-control" name="count_2cm" id="count_2cm"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">طاولة 3 سم</label>
                <div class="float-left">
                    <input value="<?php echo isset( $blockdetails->count_3cm ) ? $blockdetails->count_3cm: 0; ?>" type="text" class="form-control" name="count_3cm" id="count_3cm"  autocomplete="off">
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