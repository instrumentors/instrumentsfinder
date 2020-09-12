
@extends('layout.adminlayout')

@section('content')

<!--protected $fillable=['order_id','name','email','enquiry_desc','reseller_price','bulk_price','country','country_code','country_flag','country_emoji','city','lat','lon'];-->

<div class="container">
  <div class="row">
@if(isset($leads))
<div class="col-md-10 col-sm-6">
<div class="table-responsive">
<h3>Leads </h3>


{{-- {{ dd(get_defined_vars()['__data']) }} --}}

@php
    print($countrysel);
@endphp
<form action="/admin">
  <Label >Select Shipping country</Label>
  <select name="country">
    @foreach($countries as $country)
    <?php
        $selected="";
        if(isset($countrysel) && $country["country_shipping"] == $countrysel)
        { 
          $selected="selected";
        }
          
    ?>
    <option value="{{$country["country_shipping"]}}" {{$selected}}>{{$country["country_shipping"]}}</option>
    @endforeach
    
  </select>
  <input type="submit">
</form>


<table class="table table-sm small">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Order ID </th>
      <th scope="col">Date </th>
      <th scope="col">Domain </th>
      <th scope="col">Email</th>
      <th scope="col">Shipping to</th>
      <th scope="col">Status </th>
      
      
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
      <td>{{$lead->domain}}</td>
      <td>{{$lead->email}}</td>
      <td>{{$lead->country_shipping}}</td>
      <td>{{$lead->status}}</td>
      
      
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