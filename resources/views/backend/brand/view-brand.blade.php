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
              <li class="breadcrumb-item active">View Brand</li>
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
                <h5 >Brand List
                  <a  href="{{route('brands.add-brand')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Brand</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Brand ID</th>
                    <th style="text-align: center;">Brand Name</th>
                     <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $brand)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$brand->id}}</td>
                      <td>{{$brand->brand_name}}</td>
                        <td>
                     @if($brand->status==1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                    
                      <td>
                         @if($brand->status==1)
                          <a href="{{route('brands.inactive-brand',$brand->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                          @else
                          <a href="{{route('brands.active-brand',$brand->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                          @endif
                          <a href="{{route('brands.edit-brand',$brand->id)}}" class="btn btn-info btn-xs mr-2" > <i class="fa fa-pencil"></i></a>
                          <a href="{{route('brands.delete-brand',$brand->id)}}" class="btn btn-danger btn-xs" id="delete"> <i class="fa fa-trash"></i></a>
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