@extends("assets.layout")

@section('title', 'قائمة العملاء')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container">
    <a class="btn btn-light" href="/expenses/create">إضافة بند مصروفات</a>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">نوع الخدمة</th>
                    <th scope="col">التكلفة</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col">الاعدادات</th>
                </tr>
            </thead>
            @foreach($show as $exp)
            <tbody>
                <tr>
                    <td>{{ $exp->type }}</td>
                    <td>{{ $exp->cost }}</td>
                    <td>{{ date('d-m-Y', strtotime($exp->created_at)) }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('expenses.edit', ['expense' => $exp->id]) }}">تعديل</a>
                        <form class="d-inline" method="post" action="{{ route('expenses.destroy', ['expense' => $exp->id]) }}">
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