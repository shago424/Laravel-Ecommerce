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
              <li class="breadcrumb-item active">Update Product</li>
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
          <section class="col-md-10 offset-md-1">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">Update Product
                  <a  href="{{route('products.view-product')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Product List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:     #daf9e4    ">
                
            <form method="POST" action="{{route('products.update-product',$editdata->id)}}" class="form-horizontal"enctype="multipart/form-data">
    @csrf 
    
   <hr>
   <div class="row"> 
<div class="col-md-6">
   <div class="form-group">
        <label for="catagory_id" class="col-sm-12 control-label"> Catagory Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <select name="catagory_id" class="form-control select2bs4" id="catagory_id">
                <option value="">--Select Catagory--</option>
              @foreach($catagories as $catagory)
              <option value="{{$catagory->id}}" {{ $catagory->id == $editdata->catagory_id ?" selected":""}}>{{$catagory->catagory_name}}</option>
              @endforeach 
            </select>
            @error('catagory_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="sub_catagory_id" class="col-sm-12 control-label">Sub Catagory Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <select name="sub_catagory_id" class="form-control select2bs4" id="sub_catagory_id">
                <option value="">--Select Sub Catagory--</option>
                 @foreach($subcatagories as $subcatagory)
              <option value="{{$subcatagory->id}}" {{ $subcatagory->id == $editdata->sub_catagory_id ?" selected":""}}>{{$subcatagory->sub_catagory_name}}</option>
              @endforeach 
            </select>
            @error('sub_catagory_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
</div>
<div class="col-md-6">

   <div class="form-group">
        <label for="sub_sub_catagory_id" class="col-sm-12 control-label">Sub  Sub Cat Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <select name="sub_sub_catagory_id" class="form-control select2bs4" id="sub_sub_catagory_id">
                <option value="">--Select Sub Sub Catagory--</option>
                  @foreach($subsubcatagories as $subsubcatagory)
              <option value="{{$subsubcatagory->id}}" {{ $subsubcatagory->id == $editdata->sub_sub_catagory_id ?" selected":""}}>{{$subsubcatagory->sub_sub_catagory_name}}</option>
              @endforeach 
            </select>
            @error('sub_sub_catagory_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   <div class="form-group">
        <label for="brand_id" class="col-sm-12 control-label">Brand Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <select name="brand_id" class="form-control select2bs4" id="brand_id">
                <option value="">--Select brand--</option>
                @foreach($brands as $brand)
              <option value="{{$brand->id}}" {{ $brand->id == $editdata->brand_id ?" selected":""}}>{{$brand->brand_name}}</option>
              @endforeach 
            </select>
            @error('brand_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   
</div>
</div>
<br>
<div class="row"> 
 <div class="col-md-6">
    <div class="form-group"> 
        <label for="product_name" class="col-sm-12 control-label">Product Name <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="product_name" class="form-control" value="{{$editdata->product_name}}" id="product_name" placeholder="Product Name" data-validation="requierd">
            @error('product_name')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

      <div class="form-group"> 
        <label for="model" class="col-sm-12 control-label">Product Model</label>
        <div class="col-sm-12">
            <input type="text" name="model" class="form-control" value="{{$editdata->model}}" id="model" placeholder="Product Model" data-validation="requierd">
            @error('model')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>

   <div class="col-md-6">
    <div class="form-group"> 
        <label for="size" class="col-sm-12 control-label">Product Size</label>
        <div class="col-sm-12">
            <input type="text" name="size" class="form-control" value="{{$editdata->size}}" id="size" placeholder="Product Size" data-validation="requierd">
            @error('size')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

      <div class="form-group"> 
        <label for="color" class="col-sm-12 control-label">Product Color</label>
        <div class="col-sm-12">
             <select name="color" id="color" class="form-control select2bs4" >
                                    <option value=""> Select Product Sale Type</option>
                                    <option value="Regular"{{($editdata->color=="Regular")?"selected":""}}>Regular</option>
                                    <option value="New"{{($editdata->color=="New")?"selected":""}}>New</option>
                                     <option value="Hot Deals"{{($editdata->color=="Hot Deals")?"selected":""}}>Hot Deals</option>
                                     <option value="Special Deals"{{($editdata->color=="Special Deals")?"selected":""}}>Special Deals</option>
                                     <option value="Special Offer"{{($editdata->color=="Special Offer")?"selected":""}}>Special Offer</option>
                                     <option value="Best Seller"{{($editdata->color=="Best Seller")?"selected":""}}>Best Seller</option>
                                     <option value="Winter Offer"{{($editdata->color=="Winter Offer")?"selected":""}}>Winter Offer</option>
                                     <option value="Summer Offer"{{($editdata->color=="Summer Offer")?"selected":""}}>Summer Offer</option>
                                     <option value="Boishakhi Offer"{{($editdata->color=="Boishakhi Offer")?"selected":""}}>Boishakhi Offer</option>
                                      <option value="Eid Offer"{{($editdata->color=="Eid Offer")?"selected":""}}>Eid Offer</option>
                                </select>
            @error('color')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>
   </div>

   <br>
<div class="row"> 
 <div class="col-md-6">
    <div class="form-group"> 
        <label for="quantity" class="col-sm-12 control-label">Product Quantity <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="quantity" class="form-control" value="{{$editdata->quantity}}" id="quantity" placeholder="Product Quantity" data-validation="requierd">
            @error('quantity')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

      <div class="form-group"> 
        <label for="buy_price" class="col-sm-12 control-label">Buying Price <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="buy_price" class="form-control" value="{{$editdata->buy_price}}" id="buy_price" placeholder="Product Buying Price" data-validation="requierd">
            @error('buy_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>

   <div class="col-md-6">
    <div class="form-group"> 
        <label for="sell_price" class="col-sm-12 control-label">Sell Price <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="sell_price" class="form-control" value="{{$editdata->sell_price}}" id="sell_price" placeholder="Product Sell Price" data-validation="requierd">
            @error('sell_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

      <div class="form-group"> 
        <label for="special_price" class="col-sm-12 control-label">Special Price <span class="text-danger">*</span></label>
        <div class="col-sm-12">
            <input type="text" name="special_price" class="form-control" value="{{$editdata->special_price}}" id="special_price" placeholder="Product Special Price" data-validation="requierd">
             @error('special_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>
   </div>

    
<div class="row"> 
 <div class="col-md-6">
    <div class="form-group"> 
        <label for="special_start" class="col-sm-12 control-label"> Special Start Date <span class="text-danger">*</span></label>
        <div class="col-sm-12">
           <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" value="{{$editdata->special_end}}" name="special_start" id="special_start" class="form-control datetimepicker-input"placeholder="DD/MM/YYYY" data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
             @error('special_start')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

     

    <div class="form-group"> 
        <label for="warrenty" class="col-sm-12 control-label">Product Warranty</label>
        <div class="col-sm-12">
             <select name="warrenty" id="warrenty" class="form-control select2bs4" >
                                    <option value=""> Select Product Warranty</option>
                                    <option value="Yes"{{($editdata->warrenty=="Yes")?"selected":""}}>Yes</option>
                                    <option value="No"{{($editdata->warrenty=="No")?"selected":""}}>No</option>
                                   
                                </select>
              @error('warrenty')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

   </div>

   <div class="col-md-6">
     <div class="form-group"> 
        <label for="special_end" class="col-sm-12 control-label"> Special End Date <span class="text-danger">*</span></label>
        <div class="col-sm-12">
             <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" value="{{$editdata->special_end}}" name="special_end" id="special_end" class="form-control datetimepicker-input" placeholder="DD/MM/YYYY" l data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              @error('special_end')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

      <div class="form-group"> 
        <label for="warrenty_time" class="col-sm-12 control-label">Warranty Time</label>
        <div class="col-sm-12">
           <select name="warrenty_time" id="warrenty_time" class="form-control select2bs4" >
                                    <option value=""> Select Product Warranty Time</option>
                                    <option value="30 Days"{{($editdata->warrenty_time=="30 Days")?"selected":""}}>30 Days</option>
                                    <option value="3 Month"{{($editdata->warrenty_time=="3 Month")?"selected":""}}>3 Month</option>
                                      <option value="6 Month"{{($editdata->warrenty_time=="6 Month")?"selected":""}}>6 Month</option>
                                    <option value="1 Years"{{($editdata->warrenty_time=="1 Years")?"selected":""}}>1 Years</option>
                                     <option value="2 Years"{{($editdata->warrenty_time=="2 Years")?"selected":""}}>2 Years</option>
                                    <option value="3 Years"{{($editdata->warrenty_time=="3 Years")?"selected":""}}>3 Years</option>
                                   
                                </select>
              @error('warrenty_time')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
   </div>
   </div>

<hr>
<div class="row"> 
 <div class="col-md-4">

    <div class="form-group"> 
        <label for="image" class="col-sm-6 control-label"> Image <span class="text-danger">*</span></label>
        <div class="col-sm-6">
          <?php 
  $photos = json_decode($editdata->image);
  ?>
             <img id="showimage" src="{{asset('upload/productimage/'.$photos[0])}}"
                       alt="Product picture" style="width: 120px;height: 140px;border:1px solid #000;">
                                               <input type="file" name="image" id="image" class="form-control" data-validation="requierd" >
                                                 @error('image')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div> 

    </div>
   </div>

  
   <div class="col-md-4">
    <div class="form-group"> 
        <label for="thumbail" class="col-sm-6 control-label">Thumbail <span class="text-danger">*</span></label>
        <div class="col-sm-6">
                 <?php 
  $thums = json_decode($editdata->thumbail);
  ?>
             <img id="showimage2" src="{{asset('upload/productthumbail/'.$thums[0])}}"
alt="User Slider picture" style="width: 120px;height: 140px;border:1px solid #000;">
<input type="file" name="thumbail" id="thumbail" class="form-control" data-validation="requierd" >
 @error('thumbail')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
</div>
    </div>
      
   </div>

   <div class="col-md-4">
    <div class="form-group"> 
        <label for="video" class="col-sm-6 control-label">Video</label>
        <div class="col-sm-6">
             <img id="showimage3" src="{{url('upload/usernoimage.png')}}"
alt="User Slider picture" style="width: 120px;height: 140px;border:1px solid #000;">
   <input type="file" name="video" id="video" class="form-control" data-validation="requierd" >
    @error('video')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
        </div>
    </div>

   </div>

   </div>

   <div class="row" style="margin-left: 5px;margin-right: 5px">
    <div class="col-lg-12">
                <div class="form-group ">
                  <label class="form-control-label">Short Description <span class="text-danger">*</span></label>
                  <textarea name="short_des" id="summernote" class="form-control" placeholder="Enter Short Details ">{{$editdata->short_des}}</textarea>
                </div>
                @error('short_des')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
       
      <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description <span class="text-danger">*</span></label>
                  <textarea name="long_des" id="summernote1" class="form-control"placeholder="Enter Long Details ">{{$editdata->long_des}}</textarea>
                </div>
                @error('long_des')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
   </div>

<br>
    <div class="form-group">
        <div class="col-sm-12">
            <button style="font-size: 20px;font-weight: bold;" type="submit" class="btn btn-danger btn-block pull-right">Update Product</button>
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

      catagory_id: {
      required: true,
        
      },
      sub_catagory_id: {
        required: true,
        
      },
      sub_sub_catagory_id: {
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