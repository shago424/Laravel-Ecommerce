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
              <li class="breadcrumb-item active">Update Slider</li>
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
          <section class="col-md-6 offset-md-3">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">Update Slider
                  <a  href="{{route('sliders.view-slider')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Slider List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
             <form method="POST" action="{{route('sliders.update-slider',$editdata->id)}}" class="form-horizontal"enctype="multipart/form-data" id="myform">
                                        @csrf
                                      
         <div class="row">
          <div class="form-group col-sm-4 text-right" >
            <label for="title" class="control-label">Slider Title</label>
          </div>
          <div class="col-md-8" >
     <input type="text" name="title" class="form-control" value="{{$editdata->title}}" id="title" placeholder="Slider Title" data-validation="requierd">
      @error('title')
      <strong class="text-danger">{{$message}}</strong>
      @enderror
    </div>
      </div>
           <div class="row">
          <div class="form-group col-sm-4 text-right"> 
           <label for="sub_title" class="control-label">Slider Sub Title</label></div>
         <div class="col-md-8" >
            <input type="text" name="sub_title" class="form-control" value="{{$editdata->sub_title}}" id="sub_title" placeholder="Slider Sub Title">
            @error('sub_title')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

    <div class="row">
          <div class="form-group col-sm-4 text-right"> 
           <label for="url" class="control-label">Slider URL</label></div>
         <div class="col-md-8" >
            <input type="text" name="url" class="form-control" value="{{$editdata->url}}" id="url" placeholder="URL">
            @error('url')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
      
      <div class="row">
          <div class="form-group col-sm-4 text-right"> 
           <label for="start" class="control-label">Slider Start</label></div>
         <div class="col-md-8" >
            <input type="date" name="start" class="form-control" value="{{$editdata->start}}" id="start" placeholder="Slider Start">
            @error('start')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>

    <div class="row">
          <div class="form-group col-sm-4 text-right"> 
           <label for="end" class="control-label">Slider End</label></div>
         <div class="col-md-8" >
            <input type="date" name="end" class="form-control" value="{{$editdata->end}}" id="end" placeholder="Slider End">
            @error('end')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    </div>
<div class="row">
 <div class="form-group col-sm-4 text-right"> 
      <label for="image" class= "control-label">Slider Image</label></div>
      <div class="col-sm-8">
           <img id="showimage" src="{{(!empty($editdata->image))?url('upload/sliderimage/'.$editdata->image):url('upload/usernoimage.png')}}"
                       alt="User Slider picture" style="width: 120px;height: 140px;border:1px solid #000;">
                       <input type="file" name="image" id="image" class="form-control"> 
          @error('image')
          <strong class="text-danger">{{$message}}</strong>
          @enderror
      </div>
  </div>
<br>



                                        
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-12 col-sm-0">
                                                <button type="submit" class="btn btn-primary btn-block">Update Slider</button>
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

      title: {
      required: true,
        
      },
      sub_title: {
        required: true,
        
      },
      url: {
        required: true,
        
      },
      start: {
        required: true,
        
      },
       
      end: {
      required: true,
        
      },
image: {
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