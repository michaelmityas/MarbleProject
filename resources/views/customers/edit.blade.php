@extends("assets.layout")

@section('title', 'إضافة عملية جديد')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="post" role="form">
        @csrf
        @method('PUT')
        <div class="container text-right" style="color: white">
            <legend class="mb-4">أضافة عملية جديد</legend>
            <div class="form-group row  col-sm-10">
                <label for="cusName" class="col-sm-2">إسم العميل</label>
                <div class="float-left">
                    <input type="text" value="{{ $customer->cust_name }}" class="form-control" name="cusName" id="cusName" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="serviceType" class="col-sm-2">نوع الخدمة</label>
                <div class="float-left">
                    <select class="custom-select form-control" name="serviceType" id="serviceType">
                        <option <?php echo $customer->service_type == 'درج سلم' ? "selected": ''; ?> value="درج سلم">درج سلم</option>
                        <option <?php echo $customer->service_type == 'أرضيات' ? "selected": ''; ?> value="أرضيات">أرضيات</option>
                        <option <?php echo $customer->service_type == 'حوائط' ? "selected": ''; ?> value="حوائط">حوائط</option>
                        <option <?php echo $customer->service_type == 'وزر' ? "selected": ''; ?> value="وزر">وزر</option>
                        <option <?php echo $customer->service_type == 'أخرى' ? "selected": ''; ?> value="أخرى">أخرى</option>
                    </select>
                </div>
            </div>
            <div class="form-group row  col-sm-10">
                <label for="marbleType" class="col-sm-2">نوع الرخام</label>
                <div class="float-left">
                    <input type="text" value="{{ $customer->marble_type }}" class="form-control" name="marbleType" id="marbleType" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="amount" class="col-sm-2">الكمية</label>
                <div class="float-left">
                    <input type="text" value="{{ $customer->work_amount }}" class="form-control" name="amount" id="amount"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row  col-sm-10">
                <label for="height" class="col-sm-2">الطول</label>
                <div class="float-left">
                    <input type="text" value="{{ $customer->scale_tall }}" class="form-control" name="height" id="height" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="width" class="col-sm-2">العرض</label>
                <div class="float-left">
                    <input type="text" value="{{ $customer->scale_width }}" class="form-control" name="width" id="width"  autocomplete="off">
                </div>
            </div>
            <div class="form-group row  col-sm-10">
                <label for="cost" class="col-sm-2">إجمالى التكلفة</label>
                <div class="float-left">
                    <input type="text" value="{{ $customer->cost }}" class="form-control" name="cost" id="cost" autocomplete="off">
                </div>
            </div>
            <div class="form-group row col-sm-10">
                <label for="paid" class="col-sm-2">المدفوع</label>
                <div class="float-left">
                    <input type="text" value="{{ $customer->paid }}" class="form-control" name="paid" id="paid"  autocomplete="off">
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