@extends('master')
@section('login')


{{-- <div class="container">
    <h2>Contextual Classes</h2>
    <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p>
    <table class="table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Default</td>
          <td>Defaultson</td>
          <td>def@somemail.com</td>
        </tr>
        <tr class="success">
          <td>Success</td>
          <td>Doe</td>
          <td>john@example.com</td>
        </tr>
        <tr class="danger">
          <td>Danger</td>
          <td>Moe</td>
          <td>mary@example.com</td>
        </tr>
        <tr class="info">
          <td>Info</td>
          <td>Dooley</td>
          <td>july@example.com</td>
        </tr>
        <tr class="warning">
          <td>Warning</td>
          <td>Refs</td>
          <td>bo@example.com</td>
        </tr>
        <tr class="active">
          <td>Active</td>
          <td>Activeson</td>
          <td>act@example.com</td>
        </tr>
      </tbody>
    </table>
  </div> --}}


 <div class='container'>
 <
    <div class='row'>
<div class='col-sm-6'>
    <img src="{{ asset('/images/products/'.$details['gallery'] ) }}">
</div>

<div class='col-sm-6'>
    <a href=" /"> Go Back</a>
    <h3> Name:      {{ $details['name'] }}</h3>
    <h3> Price:     {{ $details['price']  }} </h3>
    <h3> Category:  {{ $details['category'] }} </h3>
    <h3> Description:   {{$details['description']  }} </h3>

<br/>
<br/>
<form action="/add_to_cart" method="POST">
    @csrf
<input type="hidden" name="product_id" value="{{ $details['id']  }}">
<button class="btn btn-success" >Add To Cart </button></form>
<br/>
<br/>
<button class="btn btn-primary" > Buy Now</button>
</div>
</div>
</div>

@endsection
