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
            <h1 class="m-0"><b>{{$user->name}}</b> Subscription List(s)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard/admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Subscription List(s)</li>
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
                    <th>Invoice ID</th>
                    <tH>Subscription ID</tH>
                    <tH>Customer Email</tH>
                    <th>Amount Paid</th> 
                    <th>Receipt</th> 
                    <th>Download Invoice</th>                                                            
                    <th>Interval</th>
                    <th>Created On</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($invoices)
                    @foreach($invoices->autoPagingIterator() as $index => $row)
                      <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$row->id}}</td>
                        <td>{{$row->subscription}}</td>
                        <td>{{$row->customer_email}}</td>
                        <td>${{number_format($row->amount_paid/100, 2)}}</td>
                        <td><a href="{{$row->hosted_invoice_url}}" target="_blank">Click</a></td>
                        <td><a href="{{$row->invoice_pdf}}" target="_blank">Click</a></td>
                        <td>{{date('Y-m-d',$row->period_start)}} - {{date('Y-m-d',$row->period_end)}}</td>
                        <td>{{date('Y-m-d',$row->created)}}</td>
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
