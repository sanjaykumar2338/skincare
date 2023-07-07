@extends('customer.layouts.dashboard')
@section('content')
    
@if (Session::has('message'))
  <div class="alert alert-info" style="text-align: center;">{{ Session::get('message') }}</div>
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
            <h1 class="m-0">Subscription List(s)</h1>
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
                    <th>Plan Name</th>
                    <th>Status</th>
                    <th>Created On</th>
                    <th>View Invoice</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($subscription_list)
                    @foreach($subscription_list as $index => $row)
                      <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->stripe_status}}</td>
                        <td>{{$row->created_at}}</td>
                        <td><a href="{{url('dashboard/customer/invoice-list')}}/{{$row->id}}">View</a></td>
                        <td>@if($row->stripe_status=='active')<a href="{{url('/stripe/subscription/cancel')}}/{{$row->stripe_id}}">Cancel Subscription</a>@endif</td>
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
