@extends("assets.layout")

@section('title', 'ما يخص الموردين')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">الرقم التسلسلى</th>
                    <th scope="col">أسم المورد</th>
                    <th scope="col">نوع الرخام</th>
                    <th scope="col">السعر</th>  
                    <th scope="col">الكود</th>
                    <th scope="col">المدفوع</th>
                    <th scope="col">المتبقى</th>
                    <th scope="col">الاعدادات</th>
                </tr>
            </thead>
            @foreach($sup as $s)
            <tbody>
                <tr>
                    <th scope="row">{{ $s->id }}</th>
                    <td>{{ $s->supplier_name }}</td>
                    <td>{{ $s->marble_type }}</td>
                    <td>{{ $s->marble_price }}</td>
                    <td>{{ $s->marble_code }}</td>
                    <td>{{ $s->paid }}</td>
                    <td>{{ $s->rest }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ 'suppliers/editSup/' . $s->id }}">تعديل</a>
                        <a class="btn btn-danger" href="{{ 'suppliers/deleteSup/' . $s->id }}">حذف</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        
        <a class="btn btn-light" href="/suppliers/create">إضافة مورد جديد</a>

    
        {{ $sup->links() }}
        
    </div>

@endsection