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
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Stuff</li>
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
           
           <div class="card" style="border-color: blue">
              <div class="card-header" style="background-color:  #107341 ;color: white">
                <h5>Add Stuff
                  <a  href="{{route('stuffs.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Stuff List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{route('stuffs.store')}}" id="myform"enctype="multipart/form-data">
                @csrf
                <div class="form-row">


                  <div class="form-group col-md-6">
                    <label for="name">Index NO</label>
                    <input type="text" name="index_no" id="index_no" class="form-control" placeholder="Enter Index No" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="index_no">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" >
                  </div>


                  <div class="form-group col-md-6">
                    <label for="name">Designation</label>
                    <select name="desi" id="desi" class="form-control">
                      <option value="">Select Designation</option>
                    <option value="Accountant">Accountant </option>
                     <option value="Assistant Headmaster">Assistant Headmaster</option>
                      <option value="Assistant Teacher">Assistant Teacher </option>
                   <option value="Associate Professor">Associate Professor</option>
                  <option value="Assistant Profrssor">Assistant Profrssor</option>
                  <option Value="Assistant Librarian">Assistant Librarian </option>
                   <option value="Aya">Aya</option>
                   <option value="Computer Operator">Computer Operator</option>
                     <option value="Demonstrator">Demonstrator </option>
                     <option value="Physical Teacher">Physical Teacher </option>
                      <option Value="Headmaster">Headmaster</option>
                 <option value="Lecturer">Lecturer</option>
               <option value="Librarian">Librarian </option>
                <option Value="MLSS">MLSS </option>
               <option value="Night Guard">Night Guard </option>
                  <option value="Office Helper">Office Helper</option>
                  <option value="Office Cum-Computer">Office Cum-Computer</option>
                   <option value="Principal">Principal</option>
                 <option value="Senior Teacher">Senior Teacher</option>
                   <option value="Sweper">Sweper </option>
                  <option Value="Vice-Principal">Vice-Principal</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Subject</label>
                    <select name="subject" id="subject" class="form-control">
                       <option value="">Select Subject</option>
                      <option value="Accounting">Accounting</option>
            <option Value="Agriculture">Agriculture</option>
            <option value="Arts And Craft">Arts And Craft</option>    
                        <option value="Bangla">Bangla</option>
            <option Value="Biology">Biology</option>
            <option value="Carrer">Carrer</option>    
                        <option value="Charupath">Charupath</option>
            <option Value="Chemistry">Chemistry</option>
            <option value="Civics">Civics</option>    
                     <option value="Economics">Economics</option>
            <option Value="English">English</option>
            <option value="Finance">Finance</option>    
                       <option value="General Math">General Math</option>
            <option Value="General Science">General Science</option>
            <option value="Geography">Geography</option>    
                       <option value="Global Studies">Global Studies</option>
            <option Value="Higher Math">Higher Math</option>
            <option value="History">History</option>    
                       <option value="Home Science">Home Science</option>
            <option Value="ICT">ICT</option>
            <option value="Islamic History">Islamic History</option>    
                       <option value="Islamic Studies">Islamic Studies</option>
            <option Value="Logic">Logic</option>
            <option value="Management">Mangement</option>    
                        <option value="Marketing">Marketing</option>
                        <option value="Physical Education">Physical Education</option>    
                        <option value="Physics">Physics</option>
                        <option value="Political Science">Political Science</option>
                        <option value="Philosophy">Philosophy</option>
                        <option Value="Psychology">Psychology</option>
                        <option value="Production">Produvtion</option>
                        <option value="Practicl">Practicl</option>
                        <option value="Religion">Religion</option>    
                        <option value="Social Work">Social Work</option>
                        <option value="Sociology">Sociology</option>
                        <option value="Statistics">Statistics</option>    
                        <option value="Work">Work</option>
                    </select>
                  </div>


                   <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="religion">Religion</label>
                    <select name="religion" id="religion" class="form-control">
                      <option value="">Select Religion</option>
                      <option value="Islam">Islam</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budhoo">Budhoo</option>
                      <option value="Cristian">Cristian</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="join_date">Join Date</label>
                    <input type="date" name="join_date" id="join_date" class="form-control" placeholder="Enter Joining Date" >
                  </div>

                   <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile" >
                  </div>

                   <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" >
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
                    
                <input style="font-size: 20px" type="submit" value=" Submit Stuff" name="submit" class="btn btn-primary btn-block float-right">
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
      name: {
        required: true,
        
      },
      mobile: {
        required: true,
        
      },
      gender: {
        required: true,
        
      },
       
      religion: {
      required: true,
        
      },

       
         image: {
      required: true,
        
      },
        join_date: {
      required: true,
        
      },
      

       desi: {
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