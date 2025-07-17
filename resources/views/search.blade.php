@extends('master')
@section('login')


<div class='container custom-product'>

<div class="trending-wrapper">
        <h1>Results for Searched Products</h1>

@foreach ($searchData as $item)
<div class="searched-item">
     <a href="detail/{{$item['id'] }}" >


               <img class="trending-img"   src="{{ asset('images/products/' .$item['gallery']) }}" alt="{{ $item['gallery'] }}">
               <div class="trending-item">
                 <h3>{{$item['name'] }}</h3>
                 <h5>{{$item['description'] }}</h5>
               </div>


            </a></div>
@endforeach



  </div>
</div>
@endsection
