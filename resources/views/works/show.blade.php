@extends("assets.layout")

@section('title', 'ما يخص الموردين')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container" style="overflow:auto">
    <a class="btn btn-light mb-2" href="/works/create">إضافة نشر جديد</a>

        <table  class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">الرقم التسلسلى</th>
                    <th scope="col">اسم المورد</th>
                    <th scope="col">كود البلوكة</th>
                    <th scope="col">طول البلوكة</th>
                    <th scope="col">عرض البلوكة</th>
                    <th scope="col">إرتفاع البلوكة</th>  
                    <th scope="col">نوع البلوكة</th>
                    <th scope="col">المساحة</th>
                    <th scope="col">طاولة 2 سم</th>
                    <th scope="col">طاولة 3 سم</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //this code generates numbered blocks for each supplier
                $arr = [];
                for($i=0; $i < count($data); $i++){
                    if(!array_key_exists($data[$i]->supplier_id, $arr)){
                        $arr[$data[$i]->supplier_id] = 1;
                    }
                }
             ?>
                @foreach($data as $work)
                <!-- {{ ($arr[$work->supplier_id] - $arr[$work->supplier_id] + 1) }}/{{ $work->supplier_id }}             -->
                    <tr>
                        <th>{{ $work->sawn_id }}</th>
                        <th>{{ $work->supplier_name }}</th>
                        <td>{{ $arr[$work->supplier_id] }}/{{ $work->supplier_id }}  </td>
                        <?php $arr[$work->supplier_id]++;  ?>
                        <td>{{ $work->length }}</td>
                        <td>{{ $work->width }}</td>
                        <td>{{ $work->height }}</td>
                        <td>{{ $work->type }}</td>
                        <td>{{ $work->width * $work->height * $work->length }}</td>
                        <td>{{ $work->count_2cm }}</td>
                        <td>{{ $work->count_3cm }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection