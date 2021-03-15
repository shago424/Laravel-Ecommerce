@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Stuff</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Stuff</li>
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
                <h5>Stuff List
                 
                  <a  href="{{route('stuffs.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Stuff</i></a>
                
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Index No</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Subject</th>
                    <th>Mobile</th>
                    <th style="text-align: center;">Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $stuff)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$stuff->index_no}}</td>
                      <td>{{$stuff->name}}</td>
                      <td>{{$stuff->desi}}</td>
                      <td>{{$stuff->subject}}</td>
                      <td>{{$stuff->mobile}}</td>
                      <td style="text-align: center;"><img style="width: 50px;height: 60px" 
                       src="{{(!empty($stuff->image))?url('public/upload/stuffimage/'.$stuff->image):url('public/upload/usernoimage.png')}}"
                       alt="post profile picture"></td>
                      <td>
                    <a title="Edit" href="{{route('stuffs.edit',$stuff->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('stuffs.delete',$stuff->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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