@extends('layouts.website')

@section('content') 

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 



 @include('includs.left_sitebar')



</div>

<!--row content --> 

<div class="col-xs-12 col-sm-12 col-md-9 sidebar"> 


        
     
       
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  @if($products->isEmpty())
                  <h1 class="text-center text-danger">Product Not Found</h1>
                  @else
                  @foreach($products as $product)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                    
                          <div class="image"> <a href="{{url('/product/'.$product->product_slug)}}"><img  src="{{asset('upload/productimage/'.$product->image)}}"  alt=""></a> </div> 
                          <!-- /.image -->
                          <div style="width: 50px" class="tag hot"><span>{{$product->color}}</span></div> 
                         
                        </div>
                       @php($price = false)
@if($product->special_start <= date('Y-m-d') &&  $product->special_end >= date('Y-m-d'))
                       @php($price = true) 
                       @endif
                       
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('/product/'.$product->product_slug)}}">{{$product->product_name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price">
                            <span class="price">${{$price ? $product->special_price:$product->sell_price}} 

                            @if($price)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            <span style="font-weight: bold;font-size: 14px;color: green" class="off">${{ sprintf('%.d',(($product->sell_price-$product->special_price)/$product->sell_price)*100)}}% off</span> 
                            <span class="price-before-discount pull-right"> ${{$product->sell_price}} </span>
                            @endif 
                            </div>
                            
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="{{url('/product/'.$product->product_slug)}}" title="Compare"> <i class="fa fa-eye"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  
                  @endforeach
                  @endif
                  <!-- /.item --> 
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
           
          <!-- /.filters-container --> 
          
        </div>
	</div>

</div>

</div>
</div>



@endsection