@extends('backend.layouts.master')
@section('content') 


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12 offset-md-0">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">Add Product
                  <a  href="{{route('products.view-product')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Product List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:     #d9dad6   ">
                
            <form method="POST" action="{{route('products.store-product')}}" class="form-horizontal"enctype="multipart/form-data" id="myform">
    @csrf
   
  
   <div class="row"> 
   <div class="col-md-4">
   <div class="form-group">
        <label for="catagory_id" class="col-sm-12 control-label"> Catagory Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
          <select name="catagory_id" class="form-control select2bs4" id="catagory_id">
          <option value="">--Select Catagory--</option>
                @foreach($catagories as $catagory)
                <option value="{{$catagory->id}}">{{$catagory->catagory_name}}</option>
                @endforeach 
            </select>
          @error('catagory_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>
     <div class="col-md-4">
    <div class="form-group">
        <label for="sub_catagory_id" class="col-sm-12 control-label">Sub Catagory Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <select name="sub_catagory_id" class="form-control select2bs4" id="sub_catagory_id">
                <option value="">--Select Sub Catagory--</option>
                @foreach($subcatagories as $subcatagory)
                <option value="{{$subcatagory->id}}">{{$subcatagory->sub_catagory_name}}</option>
                @endforeach
            </select>
            @error('sub_catagory_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>

<div class="col-md-4">

   <div class="form-group">
        <label for="brand_id" class="col-sm-12 control-label">Brand Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <select name="brand_id" class="form-control select2bs4" id="brand_id">
                <option value="">--Select brand--</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endforeach
            </select>
            @error('brand_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   
</div>

 <div class="col-md-4">
    <div class="form-group"> 
        <label for="product_name" class="col-sm-12 control-label">Product Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}" id="product_name" placeholder="Product Name" data-validation="requierd">
            @error('product_name')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>

 <div class="col-md-4">
      <div class="form-group"> 
        <label for="color" class="col-sm-12 control-label">Product Sale Type </label>
        <div class="col-sm-12">
             <select name="color" id="color" class="form-control select2bs4" name="color" value="{{ old('color') }}" >
                                    <option value=""> Select Product Sale Type</option>
                                    <option value="Regular">Regular</option>
                                    <option value="New">New</option>
                                    <option value="Hot Deals">Hot Deals</option>
                                    <option value="Special Deals">Special Deals</option>
                                    <option value="Special Offer">Special Offer</option>
                                     <option value="Best Seller">Best Seller</option>
                                    <option value="Winter Offer">Winter </option>
                                    <option value="Summer Offer">Summer Offer</option>
                                    <option value="Boishakhi Offer">Boishakhi Offer</option>
                                     <option value="Eid Offer">Eid Offer</option>
                                </select>
            @error('color')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>
   
  
 
 <div class="col-md-4">
    <div class="form-group"> 
        <label for="quantity" class="col-sm-12 control-label">Product Quantity <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}" id="quantity" placeholder="Product Quantity" data-validation="requierd">
            @error('quantity')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>
 <div class="col-md-4">
      <div class="form-group"> 
        <label for="buy_price" class="col-sm-12 control-label">Buying Price <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="buy_price" class="form-control" value="{{old('buy_price')}}" id="buy_price" placeholder="Product Buying Price" data-validation="requierd">
            @error('buy_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>

   <div class="col-md-4">
    <div class="form-group"> 
        <label for="sell_price" class="col-sm-12 control-label">Sell Price <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="sell_price" class="form-control" value="{{old('sell_price')}}" id="sell_price" placeholder="Product Sell Price" data-validation="requierd">
            @error('sell_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>
 <div class="col-md-4">
      <div class="form-group"> 
        <label for="special_price" class="col-sm-12 control-label">Special Price <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="special_price" class="form-control" value="{{old('special_price')}}" id="special_price" placeholder="Product Special Price">
             @error('special_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>
  <div class="col-md-4">
      <div class="form-group"> 
        <label for="model" class="col-sm-12 control-label">Product Model</label>
        <div class="col-sm-12">
            <input type="text" name="model" class="form-control" value="{{old('model')}}" id="model" placeholder="Product Model" data-validation="requierd">
            @error('model')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>



   <div class="col-md-4">
    <div class="form-group"> 
        <label for="size" class="col-sm-12 control-label">Product Size</label>
        <div class="col-sm-12">
            <input type="text" name="size" class="form-control" value="{{old('size')}}" id="size" placeholder="Product Size" data-validation="requierd">
            @error('size')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>


 

 <div class="col-md-4">
    <div class="form-group"> 
        <label for="warrenty" class="col-sm-12 control-label">Product Warranty</label>
        <div class="col-sm-12">
               <select name="warrenty" id="warrenty" class="form-control select2bs4" name="warrenty" value="No" >
                                    <option value="No"> No</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
              @error('warrenty')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>

 <div class="col-md-4">
    <div class="form-group"> 
        <label for="special_start" class="col-sm-12 control-label"> Special Start Date <span class="text-danger">*</span></label>
        <div class="col-sm-12">
           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="special_start" id="special_start" class="form-control datetimepicker-input"placeholder="yyyy-mm-dd" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
             @error('special_start')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>
     <div class="col-md-4">
     <div class="form-group"> 
        <label for="special_end" class="col-sm-12 control-label"> Special End Date <span class="text-danger">*</span></label>
        <div class="col-sm-12">
             <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="special_end" id="special_end" class="form-control datetimepicker-input" placeholder="yyyy-mm-dd" l data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              @error('special_end')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>




   
 <div class="col-md-4">
      <div class="form-group"> 
        <label for="warrenty_time" class="col-sm-12 control-label">Warranty Time</label>
        <div class="col-sm-12">
           <select name="warrenty_time" id="warrenty_time" class="form-control select2bs4" name="warrenty_time" value="{{ old('warrenty_time') }}" >
                                    <option value=""> Select Warranty Time</option>
                                    <option value="30 Days">30 Days</option>
                                    <option value="3 Month">3 Month</option>
                                    <option value="6 Month">6 Month</option>
                                    <option value="1 Years">1 Years</option>
                                    <option value="2 Years">2 Years</option>
                                    <option value="3 Years">3 Years</option>
                                  
                                </select>
              @error('warrenty_time')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>
   <hr>
<div class="col-md-4">
    <div class="form-group"> 
        <label for="image" class="col-sm-12 control-label"> Image <span class="text-danger">*</span></label>
        <div class="col-sm-12">
             <img id="showimage" src="{{url('upload/usernoimage.png')}}"
                       alt="User Slider picture" style="width: 45px;height: 55px;border:1px solid #000;">
                                               <input type="file" name="image" id="image" class="form-control" data-validation="requierd" >
                                                 @error('image')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div> 
    </div>
   </div>


    <div class="col-md-4">
    <div class="form-group"> 
        <label for="thumbail" class="col-sm-12 control-label">Thumbail <span class="text-danger">*</span></label>
        <div class="col-sm-12">
             <img id="showimage2" src="{{url('upload/usernoimage.png')}}"
alt="User Slider picture" style="width: 45px;height: 55px;border:1px solid #000;">
<input type="file" multiple name="thumbail[]" id="thumbail" class="form-control" data-validation="requierd" >
 @error('thumbail')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
</div>
    </div>
      
   </div>
  <div class="col-md-4">
    <div class="form-group"> 
        <label for="video" class="col-sm-12 control-label">Video</label>
        <div class="col-sm-12">
             <img id="showimage3" src="{{url('upload/usernoimage.png')}}"
alt="User Slider picture" style="width: 45px;height: 55px;border:1px solid #000;">
   <input type="file" multiple name="video[]" id="video" class="form-control" data-validation="requierd" >
    @error('video')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
        </div>
    </div>

   </div>
   
</div>



   <div class="row" style="margin-left: 5px;margin-right: 5px">

    <div class="col-md-6">
                <div class="form-group ">
                  <label class="form-control-label">Short Description <span class="text-danger">*</span></label>
                  <div class="mb-3">
                <textarea class="textarea" name="short_des" placeholder="Place Text Short  Description" id="short_des" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
                </div>
                @error('short_des')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
       
      <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Long Description <span class="text-danger">*</span></label>
                  <div class="mb-3">
                <textarea class="textarea" id="long_des" name="long_des" placeholder="Place Text Long  Description" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
                </div>
                @error('long_des')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
   </div>


    <div class="form-group">
        <div class="col-sm-12">
            <button style="font-size: 20px;font-weight: bold;" type="submit" class="btn btn-primary btn-block pull-right">Save Product</button>
        </div>
         </div>
     
         

                                    </form>

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT --> 
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      quantity: {
      required: true,
        
      },

      catagory_id: {
      required: true,
        
      },
      sub_catagory_id: {
        required: true,
        
      },
     
      brand_id: {
        required: true,
        
      },
       
      buy_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      special_price: {
        required: true,
        
      },
      special_start: {
        required: true,
        
      },
      special_end: {
        required: true,
        
      },
       
      product_name: {
      required: true,
        
      },
 image: {
        required: true,
        
      },
      thumbail: {
        required: true,
        
      },
      short_des: {
        required: true,
        
      },
       
      long_des: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
      },
      password: {
        required: true, 
        minlength: 6
      },
      cpassword: {
      required: true,
      equalTo:'#password'
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      },
      
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      cpassword: {
        
        equalTo:"Confirm password Does Not Match",
        }
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  @endsection