@extends("assets.layout")

@section('title', 'ما يخص الموردين')

@section('header')

@include('assets.navbar')

@endsection

@section('content')

    <div class="container">
    <a class="btn btn-light mb-2" href="/suppliers/create">إضافة توريد جديد</a>
    
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">رقم تسلسلي</th>
                    <th scope="col">أسم المورد</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">اجمالي السعر</th>                
                    <th scope="col">اجمالي المدفوع</th>
                    <th scope="col">اجمالي المتبقى</th>
                    <th scope="col">الاعدادات</th>
                </tr>
            </thead>
            @foreach($sup as $s)
            <tbody>
                <tr>
                    <td>{{ $loop->index + 1  }}</td>
                    <td>{{ $s->supplier_name }}</td>
                    <td>{{ $s->blocks_count }}</td>
                    <td>{{ $s->marble_price }}</td>
                    <td>{{ $s->paid }}</td>
                    <td>{{ $s->marble_price -  $s->paid }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <!-- Extra large modal -->
                        <button type="button" onclick='showBlocksData("{{ $s->id }}", "sawns")' class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">عرض المنشور</button>
                        <button type="button" onclick='showBlocksData("{{ $s->id }}", "all")' class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">عرض الكل</button>

                        <a type="button" href="{{ url('editSup/'.$s->id) }}" class="btn btn-primary" >تعديل</a>
                        <a type="button" href="{{ url('deleteSup/'.$s->id) }}" onclick='return confirm("هل تريد حذف هذا المورد بكل شغله؟")' class="btn btn-danger" ">حذف</a>

                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div style="color:#000" class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{$s->supplier_name}}</h5>
                                <button style="margin: -1rem -1rem -1rem -1rem;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">أسم المورد</th>
                                        <th scope="col">نوع البلوكة</th>
                                        <th scope="col">كود البلوكة</th>  
                                        <th scope="col">الطول</th>
                                        <th scope="col">العرض</th>
                                        <th scope="col">الارتفاع</th>
                                        <th id="area" scope="col">المساحة</th>
                                        <th id="count_2cm" scope="col">طاولة 2 سم</th>
                                        <th id="count_3cm" scope="col">طاولة 3 سم</th>
                                        <th scope="col">الاعدادات</th>
                                    </tr>
                                </thead>
                                <tbody id="clientData">
                                        
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        


    
        
    </div>

@endsection