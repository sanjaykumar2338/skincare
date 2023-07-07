@extends('admin.layouts.dashboard')
@section('content')
    
@if (Session::has('message'))
  <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="wrapper">

  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quote List(s)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard/admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Quote List(s)</li>
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
                <table id="example3" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Site URL</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Created On</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($users)
                    @foreach($users as $index => $row)
                      <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$row->first_name}} {{$row->last_name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone_number}}</td>
                        <td>{{$row->website_url}}</td>
                        <td>{{$row->category}}</td>
                        <td>{{$row->sub_category}}</td>
                        <td>{{$row->created_at}}</td>

                        @if(\DB::table('quote_proposal')->where('quote_id',$row->id)->count() > 0)
                        <td><a class="btn btn-primary" href="{{url('/dashboard/admin/quote/view-sent-proposal')}}/{{$row->id}}">View Sent Proposal</a></td>
                        @else
                        <td><a class="btn btn-primary" href="{{url('/dashboard/admin/quote/send-proposal')}}/{{$row->id}}">Send Proposal</a></td>
                        @endif
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
