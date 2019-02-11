
@extends('layout.adminlayout')

@section('content')

<!--protected $fillable=['order_id','name','email','enquiry_desc','reseller_price','bulk_price','country','country_code','country_flag','country_emoji','city','lat','lon'];-->

@if(isset($leads))
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID </th>
      <th scope="col">Email</th>
      <th scope="col">Enquiry Desc</th>
      <th scope="col">Shipping to</th>
      <th scope="col">Lead from :Country</th>
      <th scope="col">Lead from : city</th>
    </tr>
  </thead>
  <tbody class="thead-light">
  	@foreach($leads as $lead)
    <tr>
      <th scope="row">1</th>
      <td>{{$lead->order_id}} <a href="/lead/{{$lead->order_id}}">View order</a></td>
      <td>{{$lead->email}}</td>
      <td>{{$lead->enquiry_desc}}</td>
      <td>{{$lead->country_shipping}}</td>
      <td>{{$lead->country}} | {{$lead->country_emoji}}</td>
      <td>{{$lead->city}}</td>
    </tr>
    @endforeach
@endif 


@endsection