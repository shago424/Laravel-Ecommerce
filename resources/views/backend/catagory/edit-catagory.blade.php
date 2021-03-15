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
              <li class="breadcrumb-item active">Edit Catagory</li>
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
                <h5 style="color: white">Edit Catagory
                  <a  href="{{route('brands.view-brand')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Catagory List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
             <form method="POST" action="{{route('catagories.update-catagory',$editdata->id)}}" class="form-horizontal" id="myform">
                                        @csrf
                                        <div class="row">
                                           
                                       
                                       </div>
                                        <div class="form-group">
                                            <label for="catagory_name" class="col-sm-4 control-label">Catagory Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="catagory_name" class="form-control" value="{{$editdata->catagory_name}}" id="catagory_name" placeholder="Catagory Name" data-validation="requierd">
                                                @error('catagory_name')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror

                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" class="btn btn-danger">Update Catagory</button>
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

      catagory_name: {
      required: true,
        
      },
      name: {
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