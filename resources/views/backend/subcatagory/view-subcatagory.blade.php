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
              <li class="breadcrumb-item active">View Sub Category</li>
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
              <div class="card-header" style="background-color:   #f1c40f  ">
                <h5>  Sub Category List
                  <a  href="{{route('subcatagories.add-subcatagory')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Sub Category</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th >Sub Category ID</th>
                    <th style="text-align: center;"> Sub Category Name</th>
                     <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $subcatagory)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$subcatagory['catagory']['id']}}</td>
                       <td>{{$subcatagory['catagory']['catagory_name']}}</td>
                      <td>{{$subcatagory->id}}</td>
                      <td>{{$subcatagory->sub_catagory_name}}</td>
                      <td>
                     @if($subcatagory->status==1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                    
                      <td>
                         @if($subcatagory->status==1)
                          <a href="{{route('subcatagories.inactive-subcatagory',$subcatagory->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                          @else
                          <a href="{{route('subcatagories.active-subcatagory',$subcatagory->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                          @endif
                          <a href="{{route('subcatagories.edit-subcatagory',$subcatagory->id)}}" class="btn btn-info btn-xs mr-2" > <i class="fa fa-pencil"></i></a>
                          <a href="{{route('subcatagories.delete-subcatagory',$subcatagory->id)}}" class="btn btn-danger btn-xs" id="delete"> <i class="fa fa-trash"></i></a>
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