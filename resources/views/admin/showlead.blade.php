
@extends('layout.adminlayout')

@section('content')

<!--protected $fillable=['order_id','name','email','enquiry_desc','reseller_price','bulk_price','country','country_code','country_flag','country_emoji','city','lat','lon'];-->

@if(isset($lead_data))


@php
$time_disp=new DateTime($lead_data["lead"]["created_at"]);
$lat= $lead_data["lead"]["lat"];
$lon= $lead_data["lead"]["lon"];
@endphp


<div class="container">
	
<div id="map-canvas" style="width:300;height:300;"></div>
	<div class="card">
            <div class="card-header bg-dark text-light">
            		<div class="row">
	            		<div class="col-xs-4 col-md-4">
		                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
		                ID : {{$lead_data["lead"]["order_id"]}}
		            	</div>
		            	<div class="col-xs-4 col-md-4">
		                lead date : {{$time_disp->format('d-M-Y [H:i:s]')}}  
		                </div>
		                <div class="col-xs-4 col-md-4">	
		                lead created from : {{$lead_data["lead"]["country_emoji"]}} | {{$lead_data["lead"]["city"]}},{{$lead_data["lead"]["country"]}}s
		            	</div>
	            	</div>
	            	<div class="row">
	                	<div class="col-xs-4 col-md-4">
	                		Shipping to : {{$lead_data["lead"]["country_shipping"]}}
	                	</div>
	                	<div class="col-xs-4 col-md-4">	
	                		Reseller: {{$lead_data["lead"]["reseller_price"]}}
	                		Bulk: {{$lead_data["lead"]["bulk_price"]}}
	                	</div>	
	                	<div class="col-xs-4 col-md-4">	
	                		<a href="" class="btn btn-outline-info btn-sm pull-right">Email : {{$lead_data["lead"]["email"]}}</a>
	                	</div>	
	                </div>
            	</div>
            </div>
            
            	
           	
            <div class="card-body" style="padding:10px;border:dotted 1px;">
            	<p class="card-title" style="background-color: #ccc;">
            		enquiry desc : {{$lead_data["lead"]["enquiry_desc"]}}
            	</p>
            	@foreach($lead_data["products"] as $product)
            	@php
            		$prodcode="";
            	@endphp
                <div class="row">
                    <div class="col-xs-2 col-md-2">
                        <img src="{{$product['img']}}" width="60" alt="prewiew">
                    </div>
                    <div class="col-xs-4 col-md-6">
                        <h5 class="product-name"><strong>{{$product["name"]}}</strong></h5><h5><small>{{$product["brand"]}}</small></h5>
                    </div>
                    <div class="col-xs-6 col-md-4 row">
                        <div class="col-xs-6 col-md-6 text-right" style="padding-top: 5px">
                            <h6><strong><span class="text-muted">x </span>{{$product["quantity"]}} </strong></h6>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            {{$product["codevalue"]}}
                            @php $prodcode.=$product["codevalue"] @endphp
                        </div>
                        <div class="col-xs-2 col-md-2">
                           <a href="{{$product['url']}}" target="_new">view</a>
                        </div>
                    </div>
                </div><!--end of row-->

                @if(isset($product["options"]) && is_array($product["options"]) && count($product["options"])>0)
                	@foreach($product["options"] as $option)
                	<div class="row" >
                		<div class="col-xs-2 col-md-2">
                		</div>	
                		<div class="col-xs-4 col-md-6" style="padding-left:50px;background:#eee;">
                			
                        <h5 class="product-name"><strong>{{$option[0]["options_desc"]}}</strong></h5>
                        
                        
                    	</div>
                    	<div class="col-xs-6 col-md-4 row" style="padding-left:50px;background:#eee;">
                    		<div class="col-xs-6 col-md-6 text-right" style="padding-top: 5px">
                    		</div>	
                    		<div class="col-xs-4 col-md-4">
                    		{{$option[0]["code_value"]}}
                    		@php $prodcode.=$option[0]["code_value"] @endphp
                    		</div>
                    	</div>	

                		<!--{{print_r($option)}}-->
                	</div>

                	@if(isset($option["variant"]))
                	<div class="row" >
                		<div class="col-xs-2 col-md-2">
                		</div>	
                		<div class="col-xs-4 col-md-6" style="padding-left:50px;background:#eee;">
                        	<h5><small>{{$option["variant"][0]["variant_desc"]}}</small></h5>
                     	</div>   
                     	<div class="col-xs-6 col-md-4 row" style="padding-left:50px;background:#eee;">
                    		<div class="col-xs-6 col-md-6 text-right" style="padding-top: 5px">
                    		</div>	
                    		<div class="col-xs-4 col-md-4">
                    		{{$option["variant"][0]["code"]}}
                    		@php $prodcode.=$option["variant"][0]["code"] @endphp
                    		</div>
                    	</div>	
                     </div>	
                        @endif


                	@endforeach	
                @endif
                <div class="row">
                		<div class="col-xs-2 col-md-2">
                		</div>	
                		<div class="col-xs-10 col-md-10" style="padding-left:50px;background:#000;color:#fff;">
                        	{{$prodcode}}
                        </div>	
                 </div>       
                <hr>
                @endforeach
                

                <hr>
                
            </div>
            
        </div>
</div><!--end of container-->

<!--
[lead] => Array
        (
            [id] => 8
            [created_at] => 2019-02-07 08:41:40
            [updated_at] => 2019-02-07 08:41:40
            [order_id] => 45615c5bef44f2ea4
            [name] => 
            [email] => noaman.kazi@gmail.com
            [enquiry_desc] => 
            [reseller_price] => N
            [bulk_price] => N
            [country] => AE
            [country_code] => 
            [country_flag] => http://assets.ipstack.com/flags/ae.svg
            [country_emoji] => 🇦🇪
            [city] => Dubai
            [lat] => 25.2582
            [lon] => 55.3047
        )
-->

@endif

@endsection



<script language="javascript">
var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: {!!$lat!!}, lng: {!!$lon!!}},
          zoom: 10
                  });
      }

function loadScript() {

  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCQLN_CavkirwoBUUefx4Oaj7kEQaZlQ1Y&callback=initMap";
  document.body.appendChild(script);
}

window.onload = loadScript;

</script>

