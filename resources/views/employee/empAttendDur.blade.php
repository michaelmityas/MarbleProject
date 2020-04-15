@extends("assets.layout")

@section('title', 'مدة حضور الموظف')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container">
        <form action="{{ url('attendanceDur/getAttendance') }}" method="post" class="form-check float-right mb-4">
        @csrf
            <label for="datePicker1" style="color: white; font-weight: bold">من :</label>
            <input type="text" placeholder="اختر التاريخ" value="<?php echo isset($from) ? $from : ''; ?>" name="from" id="datePicker1"  class="ml-5" autocomplete="off">
            <label for="datePicker2" style="color: white; font-weight: bold">إالى :</label>
            <input type="text" placeholder="اختر التاريخ" value="<?php echo isset($to) ? $to : ''; ?>" name="to" id="datePicker2" autocomplete="off">
            <input type='submit' value='عرض' class='btn btn-primary row mr-3' name='submit'>
        </form>
        <table class="table table-striped table-dark">
            <thead class="text-center">
                <tr>
                    <th scope="col">الرقم التسلسلى</th>
                    <th scope="col">إسم الموظف</th>
                    <th scope="col">مدة الحضور</th>
                </tr>
            </thead>
            <tbody class="text-center">
            @if(isset($attendanceDuration))
            @foreach($attendanceDuration as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->attend_count }}</td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection