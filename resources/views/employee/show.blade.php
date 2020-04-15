@extends("assets.layout")

@section('title', 'قائمة الموظفين')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container">
    <a class="btn btn-light mb-2" href="{{ route('employees.create') }}">إضافة موظف جديد</a>
        <table class="table table-striped table-dark">
            <thead class="text-center">
                <tr>
                    <th scope="col">الرقم التسلسلى</th>
                    <th scope="col">إسم الموظف</th>
                    <th scope="col">الراتب باليوم</th>
                    <th scope="col">الوظيفة</th>
                </tr>
            </thead>
            @foreach($show as $emp)
            <tbody class="text-center">
                <tr>
                    <th scope="row">{{ $emp->id }}</th>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->salary_per_day }}</td>
                    <td>{{ $emp->job }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('employees.edit', ['employee' => $emp->id]) }}">تعديل</a>
                        <form class="d-inline" action="{{ route('employees.destroy', ['employee' => $emp->id]) }}" method="post">
                            @csrf()
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="حذف" onclick="return confirm('تأكيد مسح العنصر ؟')" >
                        </form>
                        <!-- <a class="btn btn-danger" href="{{ route('employees.destroy', ['employee' => $emp->id]) }}" onclick="return confirm('تأكيد مسح العنصر ؟')">حذف</a> -->
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table> 
    </div>

@endsection

@section("dateScript")
<script>

    function func(){
        var timeNowEle = document.getElementById('dateTime');
        var date = new Date();
        timeNowEle.innerHTML = date.getDate() + "-" + (date.getMonth() + 1) + "-"  + date.getFullYear();
    };
    window.onload = function (){
        func();
    }   

</script>