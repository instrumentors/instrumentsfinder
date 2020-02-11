@extends('layout.v2.mainlayout')

@section('content')

@inject('data','App\DataManager')

@php 

function getArrayByAlphabetGroups($arraytosort,$key)
{
	$result = array();
	foreach ($arraytosort as $item) {
    	$firstLetter = substr($item[$key], 0, 1);
    	$result[$firstLetter][] = $item;
	}

	return $result;
}	


	$pagetemplate="";
	$pageHeader ="";
	$pageDesc="";
	$link="#";
if(isset($type))
	$pagetemplate=$type;
	
	$dt = $data->getHeader_Descrption($pagetemplate);

	$pageHeader = $dt["pageHeader"];
	$pageDesc = $dt["pageDesc"];
@endphp

<div class="container">
		<div class="jumbotron_brand">
		    <div class="overlay"></div>
		    <div class="inner">
		        <h3 class="display-3">{{$pageHeader}}</h3>
		        <p class="lead">{{$pageDesc}}</p>
		        
		    </div>
		</div>
		<div id="block_cat">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb_brand">

		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page"><a href="#">{{$type}}</a></li>

		</ol>
		</nav>
	</div>
		



		<div class="row" >		
		
  			
			@if(isset($toplisting))

				@php
					$res=array();	
				@endphp
				@if($type=="brands" || $type=="applications" || $type=="categories")
					

					@php

					if($type=="brands")
						$res=getArrayByAlphabetGroups($toplisting,"brand");
					else
					if($type=="applications")	
						$res=getArrayByAlphabetGroups($toplisting,"name");
					else
					if($type=="categories")	
						$res=getArrayByAlphabetGroups($toplisting,"name");

					@endphp
					
					<div  class="row" style="width:100%;margin:auto;">
						@foreach($res as $result=>$val)
							<a style="margin-left:30px;display:block;padding:3px;" href="#{{$result}}">{{$result}}</a>
						@endforeach	
					</div>

					@php
								

								@endphp

					
					@foreach($res as $result=>$val)



								<div class="row" style="width:100%;padding-left:30px;margin-top:20px;">
									<div class="col-10 col-md-10 col-sm-4">
									<h5 style="font-weight:800;" id="{{trim($result)}}">{{trim($result)}}</h5>
									</div>
									<div class="col-1 d-sm-none d-lg-none">
										<div class="">
										<a href="#block_cat"><i style="color:#888;" class=" fa fa-chevron-circle-up"></i></a>
									</div>
									</div>
								</div>
							
							
								
								@foreach($val as $value)

								@php
								

								if($type=="brands")
								{
									$link="brand/".$data->create_slug($value['brand']);
								}
								else
								if($type=="applications")
								{
									$link="application/".$value['slug'];
								}
								else
								if($type=="categories")
								{
									$link="category/".$value['slug'];
								}
								
								
							@endphp	


								<div class="col-md-4 col-sm-12 catblockmaster">
									<a href="{{$link}}">
									<div class="catblock">
										@if($type=="brands")
										{{$value['brand']}}	
										@elseif($type=="applications" || $type=="categories")
										{{$value['name']}}	
										@endif
									</div>
									</a>
								</div>
								@endforeach
								<div class="row" style="margin-left:5%;width:90%;border-bottom:0.5px solid #ccc;padding-bottom:20px;">

								</div>	
					@endforeach

				
				
				
			@endif	
			@endif
		
		</div>
	
</div>
@endsection