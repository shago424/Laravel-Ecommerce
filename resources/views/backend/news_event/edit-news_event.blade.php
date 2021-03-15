@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage News & Events</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update News & Events</li>
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
          <section class="col-md-8 offset-md-2">
           
           <div class="card">
              <div class="card-header">
                <h5>Update News & Events
                  <a  href="{{route('news_events.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> News & Events List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{route('news_events.update',$editdata->id)}}" id="myform"enctype="multipart/form-data">
                @csrf
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="name">News & Event Date</label>
                    <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date"value="{{$editdata->date}}">
                  </div>

                  <div class="form-group col-md-8">
                    <label for="name">Title</label>
                    <input type="text" name="short_title" id="short_title" class="form-control" placeholder="Enter Short Title"value="{{$editdata->short_title}}">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="name">Details Title</label>
                    <textarea name="long_title" id="long_title" class="form-control" placeholder="Enter Long Title" rows="3">{{$editdata->long_title}}</textarea>
                  </div>

                  <div class="form-group col-md-6">
                    <img id="showimage" src="{{(!empty($editdata->image))?url('public/upload/news_eventimage/'.$editdata->image):url('public/upload/usernoimage.png')}}"
                       alt="User news_event picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Image</laNews & Eventsbel>
                    <input type="file" name="image" id="image" class="form-control" >
                  </div>

                <!--  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Not Applicable"readonly>
                  </div> -->
                    <div class="form-group col-md-12">
                    
                <input type="submit" value=" Update News & Events" name="submit" class="btn btn-danger float-right">
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

      short_title: {
      required: true,
        
      },
      long_title: {
        required: true,
        
      },
      mobile: {
        required: true,
        
      },
      gender: {
        required: true,
        
      },
       
      address: {
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