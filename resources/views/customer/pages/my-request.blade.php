@extends('customer.layouts.dashboard')
@section('content')
    
@if (Session::has('message'))
  <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="wrapper">

  @include('customer.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Request List(s)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard/customer')}}">Home</a></li>
              <li class="breadcrumb-item active">My Request</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Created On</th>
                    <th>Proposal</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($quote)
                    @foreach($quote as $index => $row)
                      <tr>
                        <td>{{$index + 1}}</td>

                        <td>{{$row->first_name}} {{$row->last_name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone_number}}</td>
                        <td>{{$row->website_url}}</td>
                        <td>{{$row->category}}</td>
                        <td>{{$row->sub_category}}</td>
                        <td>{{date('Y-m-d', strtotime($row->created_at))}}</td>
                        <td><a href="{{url('dashboard/customer/quote/proposal')}}/{{$row->id}}" class="btn btn-primary">View</a></td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>  
</div>
@stop
