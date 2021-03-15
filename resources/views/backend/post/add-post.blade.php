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
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Post</li>
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
                <h5>Add Post
                  <a  href="{{route('posts.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> Post List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{route('posts.store')}}" id="myform"enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="name">Post Category</label>
                    <select name="catagory_id" id="catagory_id" class="form-control">
                       <option value="">Select Catagory Name</option>
                    @foreach($catagories as $catagory)
                    <option value="{{$catagory->id}}">{{$catagory->catagory_name}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="name">Post Date</label>
                    <input type="date" name="post_date" id="post_date" class="form-control" placeholder="Enter Post Date" >
                  </div>

                   <div class="form-group col-md-12">
                    <label for="name">Post Title</label>
                    <input type="text" name="post_title" id="post_title" class="form-control" placeholder="Enter Post Title" >
                  </div>

                  <div class="form-group col-md-12">
                    <label for="name">Short Title</label>
                    <input type="text" name="short_title" id="short_title" class="form-control" placeholder="Enter Short Title Title" >
                  </div>

                  <div class="form-group col-md-12">
                    <label for="name">Post Details</label>
                    <textarea name="post_details" id="post_details" class="form-control" placeholder="Enter Post Details" rows="5"></textarea>
                  </div>

                
                   <div class="form-group col-md-6">
                    <img id="showimage2" src="{{url('public/upload/usernoimage.png')}}"
                       alt="User Post picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Post File</label>
                    <input type="file" name="post_file" id="post_file" class="form-control" >
                  </div>
                  
                  <div class="form-group col-md-6">
                    <img id="showimage" src="{{url('public/upload/usernoimage.png')}}"
                       alt="User Post picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" >
                  </div>

                <!--  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Not Applicable"readonly>
                  </div> -->
                    <div class="form-group col-md-12">
                    
                <input type="submit" value=" Submit Post" name="submit" class="btn btn-danger float-right">
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

      post_details: {
      required: true,
        
      },
      post_date: {
        required: true,
        
      },
      mobile: {
        required: true,
        
      },
      post_title: {
        required: true,
        
      },
       
      catagory_id: {
      required: true,
        
      },

 image: {
      required: true,
        
      },
      
      short_title: {
        required: true,
        
       
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