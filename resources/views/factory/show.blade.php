@extends("assets.layout")

@section('title', 'أنواع الرخام وأسعارها')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container">
    <a class="btn btn-light" href="/factories/create">إضافة نوع جديد</a>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">الرقم التسلسلى</th>
                    <th scope="col">النوع</th>
                    <th scope="col">اللون</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الاعدادات</th>
                </tr>
            </thead>
            @foreach($fac as $facts)
            <tbody>
                <tr>
                    <th scope="row">{{ $facts->id }}</th>
                    <td>{{ $facts->type }}</td>
                    <td>{{ $facts->color }}</td>
                    <td>{{ $facts->price }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('/editFac/' . $facts->id) }}">تعديل</a>
                        <a class="btn btn-danger" onclick="return confirm('تأكيد مسح العنصر ؟')" href="{{ url('/delFac/' . $facts->id) }}">حذف</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        
        
    </div>

@endsection