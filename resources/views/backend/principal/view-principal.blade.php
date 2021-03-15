@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Principal</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Principal</li>
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
          <section class="col-md-12">
           
           <div class="card">
              <div class="card-header">
                <h5>Principal List
                  @if($countmission<1)
                  <a  href="{{route('principals.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Principal</i></a>
                  @endif
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Principal ID</th>
                    <th>Principal Title</th>
                    <th>Principal Short Write</th>
                    <th style="text-align: center;">Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $principal)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$principal->id}}</td>
                      <td>{{$principal->title}}</td>
                      <td>{{$principal->short_title}}</td>
                      <td style="text-align: center;"><img style="width: 50px;height: 60px" class="profile-mission-img img-fluid img-circle"
                       src="{{(!empty($principal->image))?url('public/upload/principalimage/'.$principal->image):url('public/upload/usernoimage.png')}}"
                       alt="principal profile picture"></td>
                      <td>
                    <a title="Edit" href="{{route('principals.edit',$principal->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('principals.delete',$principal->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
  @endsection