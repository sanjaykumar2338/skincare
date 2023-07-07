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
            <h1 class="m-0">Proposal List(s)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard/customer')}}">Home</a></li>
              <li class="breadcrumb-item active">Proposal</li>
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
                    <th>Title (Click to view)</th>
                    <th>Created On</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($subscription_list)
                    @foreach($subscription_list as $index => $row)
                      <tr>
                        <td>{{$index + 1}}</td>
                        <td><a href="{{ Storage::url('public/'.$row->file)}}">{{$row->file }}</a></td>
                        <td>{{$row->created_at}}</td>
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
