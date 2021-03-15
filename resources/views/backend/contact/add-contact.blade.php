@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Contact</li>
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
                <h5>Add Contact
                  <a  href="{{route('contacts.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> Contact List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{route('contacts.store')}}" id="myform"enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="name">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Short Mobile">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Enter Short Facebook ID">
                  </div>
                <div class="form-group col-md-6">
                    <label for="name">Twitter</label>
                    <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Enter Twitter ID">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Youtube</label>
                    <input type="text" name="youtube" id="youtube" class="form-control" placeholder="Enter Youtube Channel">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Google Plus</label>
                    <input type="text" name="googleplus" id="googleplus" class="form-control" placeholder="Enter Google Plus ID">
                  </div>



                    <div class="form-group col-md-12">
                    
                <input type="submit" value=" Submit Contact" name="submit" class="btn btn-danger float-right">
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

      address: {
      required: true,
        
      },
      mobile: {
        required: true,
        
      },
      facebook: {
        required: true,
        
      },
      email: {
        required: true,
        email: true
        
      },
       
      twitter: {
      required: true,
        
      },


      youtube: {
        required: true,
        
       
      },
      googleplus: {
        required: true, 
        
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