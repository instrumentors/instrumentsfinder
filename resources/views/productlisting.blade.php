
@extends('layout.theme.mainlayout')

@section('content')


<?php
$cat_name="";

//print_r($productlistings);
?>

@if(isset($categoriesblock))
<?php
  $cat_name=$categoriesblock[0]["name"];
?>  
@endif

@if(isset($brandsblock))
<?php
  $cat_name=$brandsblock[0]["name"];
?>  
@endif


<div class="breadcrumbs-section plr-120 mb-20">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">{{$cat_name}}</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="/">Home</a></li>
                            <li>{{$cat_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3 col-xs-12">
                            <div class="shop-content">
                                <!-- shop-option start -->
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="shop-tab f-left" role="tablist">
                                        <li class="">
                                            <a href="#grid-view" data-toggle="tab" aria-expanded="false"><i class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li class="active">
                                            <a href="#list-view" data-toggle="tab" aria-expanded="true"><i class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                    
                                    <!-- showing -->
                                    @if(isset($productlistings))
                                    <div class="showing f-right text-right">
                                        <span>Showing : {{count($productlistings)}} products</span>
                                    </div>                      
                                    @endif             
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    @if(isset($productlistings))
                                    <div role="tabpanel" class="tab-pane" id="grid-view">
                                        <div class="row">
                                           @foreach($productlistings as $productlisting)


                                              <?php
  $prodslug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $productlisting->name)));

  ?>
                                            <!-- product-item start -->
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="single-product.html">
                                                            <img src="img/product/7.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                             <a href="/product/{{$productlisting->prod_id}}/{{$prodslug}}">{{$productlisting->name}} </a>
                                                        </h6>
                                                        
                                                        <h3 class="pro-price">{{$productlisting->brand}}</h3>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product-item end -->
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <!-- list-view -->
                                    @if(isset($productlistings))
                                    <div role="tabpanel" class="tab-pane active" 
                                    id="list-view">
                                        <div class="row">
                                            
                                            <!-- product-item start -->
                                            

                                              @foreach($productlistings as $productlisting)

                                              <?php
  $prodslug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $productlisting->name)));

  ?>

                                            <div class="col-md-12">
                                                <div class="shop-list product-item" style="height:200px;">
                                                    <div class="product-img" style="margin:auto;">
                                                        <a href="/product/{{$productlisting->prod_id}}/{{$prodslug}}">
                                                            <img src="{{$productlisting->img}}" alt="" style='height: auto;;width: auto; max-width: 200px;height: 200px;'>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="clearfix">
                                                            <h6 class="product-title f-left">
                                                               <a href="/product/{{$productlisting->prod_id}}/{{$prodslug}}">{{$productlisting->name}} </a>
                                                            </h6>
                                                            
                                                        </div>
                                                        <h6 class="brand-name mb-30">{{$productlisting->brand}}</h6>
                                                        
                                                        <p>{{$productlisting->short_desc}}</p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                               
                                            <!-- product-item end -->
                                         </div>
                                        @endif                                         
                                    </div>
                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                               
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <!--left side bar-->
                        <div class="col-md-3 col-md-pull-9 col-xs-12">
                            <!-- widget-search -->
                            <aside class="widget-search mb-30">
                                <form action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </aside>
                            
                            <!-- operating-system -->
                            @if(isset($applicationsblock) && count($applicationsblock)>0)
                            <aside class="widget operating-system box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Applications</h6>
                                <form action="action_page.php">
                                  @foreach ($applicationsblock as $k=>$v)
                                    <label><input type="checkbox" name="operating-1" value="phone-1">{{$k}}  [{{$v}}]</label><br>
                                    @endforeach
                                    
                                </form>
                            </aside>
                             @endif                             
                            
                            <!-- operating-system -->
                            @if(isset($categoriesblock) && count($categoriesblock)>0)
                            <aside class="widget operating-system box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Categories</h6>
                                <form action="action_page.php">
                                  @foreach ($categoriesblock as $k=>$v)
                                    <label><input type="checkbox" name="operating-1" value="phone-1">{{$v['name']}}  [{{$v['total']}}]</label><br>
                                    @endforeach
                                    
                                </form>
                            </aside>
                             @endif                             
                            

                        </div>
                        <!--left side bar-->
                        
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->
        </div>
@endsection
