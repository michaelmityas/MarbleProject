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