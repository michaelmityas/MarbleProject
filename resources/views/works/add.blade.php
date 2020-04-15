@extends("assets.layout")

@section('title', 'أضافة نشر')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('works.store') }}" method="post" role="form">
        {{ csrf_field() }}
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة نشر جديد</legend>
            <div class="form-group row col-sm-10">
                <label for="marble-name" class="col-sm-2 col-form-label">أسم المورد</label>
                <div class="float-left">
                    <select style="width:203px" onchange="getBlocksCode(e)" class="form-control" name="select_supplier_name" id="e">
                    <option value="none">إختر اسم المورد</option>
                        @foreach($suppliers as $s)
                            <option value="{{ $s->id }}">{{ $s->supplier_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div   class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">كود البوكة</label>
                <div class="float-left">
                    <select style="width:203px" class="form-control" name="block_code" id="block_code">
                      
                    </select>
                </div>
            </div>

            <div id="blocks-info">
               
            </div>
            

            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">طول البلوكة</label>
                <div class="float-left">
                    <input type="number" step="0.01" class="form-control" name="t_length" id="t_length"  autocomplete="off">
                </div>
            </div>

            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">عرض البلوكة</label>
                <div class="float-left">
                    <input type="number" step="0.01" class="form-control" name="t_width" id="t_width"  autocomplete="off">
                </div>
            </div>
 
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">عدد الطاولات 2 سم</label>
                <div class="float-left">
                    <input type="number" class="form-control" name="count_2cm" id="count_2cm"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">عدد الطاولات 3 سم</label>
                <div class="float-left">
                    <input type="number" class="form-control" name="count_3cm" id="count_3cm"  autocomplete="off">
                </div>
            </div>
            <div class="form-group col-sm-10">
                <input type="submit" value="إضافة" name="submit" class="btn btn-primary">
            </div>
        </div>
        <input type="hidden" value="" name="submit" class="btn btn-primary">
    </form>
    @foreach($errors->all() as $err)
    <div class="alert alert-danger">
        {{ $err }}
    </div>
    @endforeach
@endsection