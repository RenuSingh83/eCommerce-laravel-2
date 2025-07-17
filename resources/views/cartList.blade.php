@extends('master')
@section('login')



  <div class='container'>


    @foreach( $cartDetails  as  $item)


    <div class='row'>
<div class='col-sm-6'>
    <img src="{{ asset('/images/products/'. $item['gallery'] ) }}">
</div>

<div class='col-sm-6'>
     <a href=" /"> Go Back</a>
      <h3> product id:      {{ $item['pid']}}</h3>
      <h3> cartRowID:  {{ $item['cartRowID'] }}</h3>
    <h3> Name:      {{ $item['name']}}</h3>
    <h3> Price:     {{ $item['price']  }} </h3>
    <h3> Category:  {{ $item['category'] }} </h3>
    <h3> Description:   {{$item['description']  }} </h3>

<br/>
<br/>
<form action="/removeItem/{{ $item['cartRowID']  }}" method="POST">
@csrf
<input type="hidden" name="product_id" value="{{ $item['cartRowID']  }}">
<button class="btn btn-success" >Remove this from Cart </button>
</form>
<form action="/BuyLaterItem/{{ $item['cartRowID']  }}" method="POST">
@csrf
<button class="btn btn-success" >will buy it later </button>
</form>
<br/>
<br/>
<button class="btn btn-primary" > Buy Now</button>
</div>

    </div>
  @endforeach
</div>
@endsection
