@extends("assets.layout")

@section('title', 'قائمة العملاء')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container">
    <a class="btn btn-light" href="/customers/create">إضافة عمل جديد</a>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">الرقم التسلسلى</th>
                    <th scope="col">إسم العميل</th>
                    <th scope="col">نوع الخدمة</th>
                    <th scope="col">نوع الرخام</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">الطول</th>
                    <th scope="col">العرض</th>
                    <th scope="col">التكلفة</th>
                    <th scope="col">المدفوع</th>
                    <th scope="col">الاعدادات</th>
                </tr>
            </thead>
            @foreach($custData as $cust)
            <tbody>
                <tr>
                    <th>{{ $cust->id }}</th>
                    <td>{{ $cust->cust_name }}</td>
                    <td>{{ $cust->service_type }}</td>
                    <th>{{ $cust->marble_type }}</th>
                    <td>{{ $cust->work_amount }}</td>
                    <td>{{ $cust->scale_tall }}</td>
                    <th>{{ $cust->scale_width }}</th>
                    <td>{{ $cust->cost }}</td>
                    <td>{{ $cust->paid }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('customers.edit', ['customer' => $cust->id]) }}">تعديل</a>
                        <form class="d-inline" method="post" action="{{ route('customers.destroy', ['customer' => $cust->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="حذف" class="btn btn-danger" onclick="return confirm('تأكيد مسح العنصر ؟')">
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        
        
    </div>

@endsection