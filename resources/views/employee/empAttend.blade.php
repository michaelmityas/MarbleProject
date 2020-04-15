@extends("assets.layout")

@section('title', 'تحضير الموظفين')

@section('header')

@include('assets.navbar')

@endsection

@section('content')
<div class="container">
    <div class="">
        <p id="dateTime" class="text-center date"></p>
    </div>
    
    <table class="table table-striped table-dark">
        <thead class="text-center">
            <tr>
                <th scope="col">الرقم التسلسلى</th>
                <th scope="col">إسم الموظف</th>
                <th scope="col">الحضور</th>
            </tr>
        </thead>
        <form action="{{ url('attendance/checkAttendance') }}" method="post" class="form-check">
        @csrf
        @foreach($show as $emp)
        <tbody class="text-center">
            <tr>
                <th scope="row">{{ $emp->id }}</th>
                <td>{{ $emp->name }}</td>
                <td>
                    <input class="form-check-input" name="checkAttend[]" type="checkbox" value="{{ $emp->id }}">
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
        <button type="submit" class="btn btn-primary">حضور</button>
    </form>
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
@endsection
