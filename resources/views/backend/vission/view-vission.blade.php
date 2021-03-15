@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Vission</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Vission</li>
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
                <h5>Vission List
                  @if($countvission<1)
                  <a  href="{{route('vissions.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Vission</i></a>
                  @endif
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Vission ID</th>
                    <th>Vission Title</th>
                    <th>File Download</th>
                    <th style="text-align: center;">Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $vission)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$vission->id}}</td>
                      <td>{{$vission->title}}</td>
                      <td> <a class="btn btn-success btn-sm" href="{{asset('public/upload/postfile/'.$vission->post_file)}}" target="_blank">File Preview</a></td>
                      <td style="text-align: center;"><img style="width: 50px;height: 60px" class="profile-vission-img img-fluid img-circle"
                       src="{{(!empty($vission->image))?url('public/upload/postimage/'.$vission->image):url('public/upload/usernoimage.png')}}"
                       alt="vission profile picture"></td>
                      <td>
                    <a title="Edit" href="{{route('vissions.edit',$vission->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('vissions.delete',$vission->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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