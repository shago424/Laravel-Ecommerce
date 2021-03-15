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
              <li class="breadcrumb-item active">Update Stuff</li>
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
                <h5>Update Stuff
                  <a  href="{{route('stuffs.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Stuff List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{route('stuffs.update',$editdata->id)}}" id="myform"enctype="multipart/form-data">
                @csrf
                <div class="form-row">


                  <div class="form-group col-md-6">
                    <label for="name">Index NO</label>
                    <input type="text" name="index_no" id="index_no" class="form-control" placeholder="Enter Index No" value="{{$editdata->index_no}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="index_no">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{$editdata->name}}">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="name">Designation</label>
                    <select name="desi" id="desi" class="form-control">
                      <option value="">Select Designation</option>
                    <option value="Accountant"{{($editdata->desi=="Accountant")?"selected":""}}>Accountant </option>
                     <option value="Assistant Headmaster"{{($editdata->desi=="Assistant Headmaster")?"selected":""}}>Assistant Headmaster</option>
                      <option value="Assistant Teacher"{{($editdata->desi=="Assistant Teacher")?"selected":""}}>Assistant Teacher </option>
                   <option value="Associate Professor"{{($editdata->desi=="Associate Professor")?"selected":""}}>Associate Professor</option>
                  <option value="Assistant Profrssor"{{($editdata->desi=="Assistant Profrssor")?"selected":""}}>Assistant Profrssor</option>
                  <option Value="Assistant Librarian"{{($editdata->desi=="Assistant Librarian")?"selected":""}}>Assistant Librarian </option>
                   <option value="Aya"{{($editdata->desi=="Aya")?"selected":""}}>Aya</option>
                   <option value="Computer Operator"{{($editdata->desi=="Computer Operator")?"selected":""}}>Computer Operator</option>
                     <option value="Demonstrator"{{($editdata->desi=="Demonstrator")?"selected":""}}>Demonstrator </option>
                     <option value="Physical Teacher"{{($editdata->desi=="Physical Teacher")?"selected":""}}>Physical Teacher </option>
                      <option Value="Headmaster"{{($editdata->desi=="Headmaster")?"selected":""}}>Headmaster</option>
                 <option value="Lecturer"{{($editdata->desi=="Lecturer")?"selected":""}}>Lecturer</option>
               <option value="Librarian"{{($editdata->desi=="Librarian")?"selected":""}}>Librarian </option>
                <option Value="MLSS"{{($editdata->desi=="MLSS")?"selected":""}}>MLSS </option>
               <option value="Night Guard"{{($editdata->desi=="Night Guard")?"selected":""}}>Night Guard </option>
                  <option value="Office Helper"{{($editdata->desi=="Office Helper")?"selected":""}}>Office Helper</option>
                  <option value="Office Cum-Computer"{{($editdata->desi=="Office Cum-Computer")?"selected":""}}>Office Cum-Computer</option>
                   <option value="Principal"{{($editdata->desi=="Principal")?"selected":""}}>Principal</option>
                 <option value="Senior Teacher"{{($editdata->desi=="Senior Teacher")?"selected":""}}>Senior Teacher</option>
                   <option value="Sweper"{{($editdata->desi=="Sweper")?"selected":""}}>Sweper </option>
                  <option Value="Vice-Principal"{{($editdata->desi=="Vice-Principal")?"selected":""}}>Vice-Principal</option>
                    </select>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="name">Subject</label>
                    <select name="subject" id="subject" class="form-control">
                       <option value="">Select Subject</option>
                      <option value="Accounting"{{($editdata->subject=="Accounting")?"selected":""}}>Accounting</option>
            <option Value="Agriculture"{{($editdata->subject=="Agriculture")?"selected":""}}>Agriculture</option>
            <option value="Arts And Craft"{{($editdata->subject=="Arts And Craft")?"selected":""}}>Arts And Craft</option>    
                        <option value="Bangla"{{($editdata->subject=="Bangla")?"selected":""}}>Bangla</option>
            <option Value="Biology"{{($editdata->subject=="Biology")?"selected":""}}>Biology</option>
            <option value="Carrer"{{($editdata->subject=="Carrer")?"selected":""}}>Carrer</option>    
                        <option value="Charupath"{{($editdata->subject=="Charupath")?"selected":""}}>Charupath</option>
            <option Value="Chemistry"{{($editdata->subject=="Chemistry")?"selected":""}}>Chemistry</option>
            <option value="Civics"{{($editdata->subject=="Civics")?"selected":""}}>Civics</option>    
                     <option value="Economics"{{($editdata->subject=="Economics")?"selected":""}}>Economics</option>
            <option Value="English"{{($editdata->subject=="English")?"selected":""}}>English</option>
            <option value="Finance"{{($editdata->subject=="Finance")?"selected":""}}>Finance</option>    
                       <option value="General Math"{{($editdata->subject=="General math")?"selected":""}}>General Math</option>
            <option Value="General Science"{{($editdata->subject=="General Science")?"selected":""}}>General Science</option>
            <option value="Geography"{{($editdata->subject=="Geography")?"selected":""}}>Geography</option>    
                       <option value="Global Studies"{{($editdata->subject=="Global Dtudies")?"selected":""}}>Global Studies</option>
            <option Value="Higher Math"{{($editdata->subject=="Higher Math")?"selected":""}}>Higher Math</option>
            <option value="History"{{($editdata->subject=="History")?"selected":""}}>History</option>    
                       <option value="Home Science"{{($editdata->subject=="Home Science")?"selected":""}}>Home Science</option>
            <option Value="ICT"{{($editdata->subject=="ICT")?"selected":""}}>ICT</option>
            <option value="Islamic History"{{($editdata->subject=="Islamic History")?"selected":""}}>Islamic History</option>    
                       <option value="Islamic Studies"{{($editdata->subject=="Islamic Studies")?"selected":""}}>Islamic Studies</option>
            <option Value="Logic"{{($editdata->subject=="Logic")?"selected":""}}>Logic</option>
            <option value="Management"{{($editdata->subject=="Management")?"selected":""}}>Mangement</option>    
                        <option value="Marketing"{{($editdata->subject=="Marketing")?"selected":""}}>Marketing</option>
                        <option value="Physical Education"{{($editdata->subject=="Physical Education")?"selected":""}}>Physical Education</option>  
                        <option value="Political Science"{{($editdata->subject=="Political Science")?"selected":""}}>Political Science</option>
                        <option value="Philosophy"{{($editdata->subject=="Philosophy")?"selected":""}}>Philosophy</option>  
                        <option value="Physics"{{($editdata->subject=="work")?"selected":""}}>Physics</option>
                        <option Value="Psychology"{{($editdata->subject=="Psychology")?"selected":""}}>Psychology</option>
                        <option value="Production"{{($editdata->subject=="Production")?"selected":""}}>Produvtion</option>
                        <option value="Practicl"{{($editdata->subject=="Practical")?"selected":""}}>Practicl</option>
                        <option value="Religion"{{($editdata->subject=="Religion")?"selected":""}}>Religion</option>    
                        <option value="Social Work"{{($editdata->subject=="Social Work")?"selected":""}}>Social Work</option>
                        <option value="Sociology"{{($editdata->subject=="Sociology")?"selected":""}}>Sociology</option>
                        <option value="Statistics"{{($editdata->subject=="Statistics")?"selected":""}}>Statistics</option>    
                        <option value="Work"{{($editdata->subject=="Work")?"selected":""}}>Work</option>
                    </select>
                  </div>


                   <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="Male"{{($editdata->gender=="Male")?"selected":""}}>Male</option>
                      <option value="Female"{{($editdata->gender=="Female")?"selected":""}}>Female</option>
                      <option value="Other"{{($editdata->gender=="Other")?"selected":""}}>Other</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="religion">Religion</label>
                    <select name="religion" id="religion" class="form-control">
                      <option value="">Select Religion</option>
                      <option value="Isalam"{{($editdata->religion=="Isalam")?"selected":""}}>Islam</option>
                      <option value="Hindu"{{($editdata->religion=="Hindu")?"selected":""}}>Hindu</option>
                      <option value="Budhoo" {{($editdata->religion=="Budhoo")?"selected":""}}>Budhoo</option>
                      <option value="Cristian" {{($editdata->religion=="Cristian")?"selected":""}}>Cristian</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="join_date">Join Date</label>
                    <input type="date" name="join_date" id="join_date" class="form-control" placeholder="Enter Joining Date"  value="{{$editdata->join_date}}">
                  </div>

                   <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="{{$editdata->address}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile"value="{{$editdata->mobile}}">
                  </div>

                   <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{$editdata->email}}" >
                  </div>
                
                
                   
                  
                   <div class="form-group col-md-6">
                    <img id="showimage" src="{{(!empty($editdata->image))?url('public/upload/stuffimage/'.$editdata->image):url('public/upload/usernoimage.png')}}"
                       alt="User stuff picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Photo</label>
                    <input type="file" name="image" id="image" class="form-control" >
                  </div>

                <!--  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Not Applicable"readonly>
                  </div> -->
                    <div class="form-group col-md-12">
                    
                <input style="font-size: 20px" type="submit" value=" Update Stuff" name="submit" class="btn btn-danger btn-block float-right">
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