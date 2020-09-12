
@extends('layout.adminlayout')

@section('content')

<!--protected $fillable=['order_id','name','email','enquiry_desc','reseller_price','bulk_price','country','country_code','country_flag','country_emoji','city','lat','lon'];-->

<div class="container">
  <div class="row">
@if(isset($leads))
<div class="col-md-10 col-sm-6">
<div class="table-responsive">
<h3>Leads </h3>

<table class="table table-sm small">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Order ID </th>
      <th scope="col">Date </th>
      <th scope="col">Email</th>
      <th scope="col">Shipping to</th>
      
      
    </tr>
  </thead>
  <tbody class="thead-light">
  	@foreach($leads as $lead)
    
    <?php

    
    $lead_date = date('d-M',strtotime($lead->created_at));

    ?>

    <tr>
      
      <td><a href="/lead/{{$lead->order_id}}">{{$lead->order_id}} </a></td>
      <td>{{$lead_date}}</td>
      <td>{{$lead->email}}</td>
      <td>{{$lead->country_shipping}}</td>
      
      
    </tr>
    @endforeach
    </tbody>
   </table> 
 </div>
</div>
</div>
{{$leads->links()}}
@endif 



</div>

@endsection