@extends("assets.layout")

@section('title', 'الصفحة الرئيسية')

@section('header')

    <h1 class="h1-home">مصنع الرومانى للرخام والجرانيت</h1>

@endsection

@section('content')

<div class="card-group container card-home">
  <div class="card">
    <img src="img/marble1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><a href="/factories" class="link-item">التصنيع</a></h5>
    </div>
  </div>
  <div class="card">
    <img src="img/marble2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><a href="/suppliers" class="link-item">الموردين</a></h5>
    </div>
  </div>
  <div class="card">
    <img src="img/marble3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><a href="/works" class="link-item">النشر</a></h5>
    </div>
  </div>
  <div class="card">
    <img src="img/marble6.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><a href="/customers" class="link-item">العملاء</a></h5>
    </div>
  </div>
  <div class="card">
    <img src="img/marble5.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><a href="/employees" class="link-item">الموظفين</a></h5>
    </div>
  </div>
</div>

@endsection

