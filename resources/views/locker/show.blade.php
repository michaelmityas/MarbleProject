@extends("assets.layout")

@section('title', 'الخزينة')

@section('header')

    @include('assets.navbar')

@endsection

@section('content')



    <div class="container">

    <form action="{{ route('getMoney') }}" method="post" class="col-sm-12 text-right mb-4" style="border:1px solid white; padding:10px 5px">
    @csrf
        <select class="col-sm-2"  onchange="generateSelect(incomeoroutcome)" id="incomeoroutcome" name="incomeoroutcome">
            <option value="0">اختر النوع</option>
            <option value="income">الايرادات</option>
            <option value="outcome">المصروفات</option>
        </select>

            <label for="datePicker1" style="color: white; font-weight: bold">من :</label>
            <input type="text" placeholder="اختر التاريخ" value="<?php echo isset($from) ? $from : ''; ?>" name="from" id="datePicker1"  class="" autocomplete="off">
            <label for="datePicker2" style="color: white; font-weight: bold">إلى :</label>
            <input type="text" placeholder="اختر التاريخ" value="<?php echo isset($to) ? $to : ''; ?>" name="to" id="datePicker2" autocomplete="off">
            <input type='submit' value='عرض' class='btn btn-primary row mr-3' name='submit'>

    </form>
    <table class="table table-striped table-dark">
        <thead class="text-center">
            <tr>
                <th scope="col">البند</th>
                <th scope="col">المبلغ</th>
            </tr>
        </thead>
        <tbody class="text-center">
        @if(isset($money))
            <tr>
                <td>{{ $item }}</td>
                <td>{{ $money->paid }}</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

@endsection