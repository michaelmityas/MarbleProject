@extends("assets.layout")

@section('title', 'أضافة مورد')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('suppliers.store') }}" method="post" role="form">
        {{ csrf_field() }}
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة مورد جديد</legend>
            <div class="form-group row col-sm-10">
                <label for="marble-name" class="col-sm-2 col-form-label">أسم المورد</label>
                <div class="float-left">
                    <select style="width:203px" onchange="displaySupplierTextBox(e)" class="form-control" name="select_supplier_name" id="e">
                        <option value="new">مورد جديد</option>
                        @foreach($suppliers as $s)
                            <option value="{{ $s->id }}">{{ $s->supplier_name }}</option>
                        @endforeach
                    </select>
                    <input type="text" style="display:inline" class="form-control mt-2" name="supplier_name" id="supplier-name" autocomplete="off">
                </div>
            </div>
            <div   class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">عدد البوكات</label>
                <div class="float-left">
                    <input onchange="addNewBoxes(this)" onnkeyup="addNewBoxes(this)" type="number" class="form-control" name="blocks_count" id="blocks_count"  autocomplete="off">
                </div>
            </div>

            <div id="blocks-info">
               
            </div>
            

            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label">سعر الرخام</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="marblePrice" id="marble-price"  autocomplete="off">
                </div>
            </div>
 
            <div class="form-group row col-sm-10">
                <label for="marble-price" class="col-sm-2 col-form-label"> المبلغ المدفوع</label>
                <div class="float-left">
                    <input type="text" class="form-control" name="paid" id="paid"  autocomplete="off">
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