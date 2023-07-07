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
            <h1 class="m-0">View Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard/admin')}}">Home</a></li>
              <li class="breadcrumb-item active">View Proposal</li>
            </ol>            
          </div><!-- /.col -->          
        </div><!-- /.row -->
        <button onclick="history.back()" class="btn btn-info">Go Back</button>
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
                <form action="{{url('dashboard/admin/update/quote/reply')}}/{{$proposal->id}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" value="{{$proposal->title}}" required class="form-control" id="title" placeholder="Enter Title" name="title">
                  </div>
                  
                  <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" required rows="7" id="description" placeholder="Enter Description" name="description">{{$proposal->description}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" value="{{$proposal->price}}" id="price" placeholder="Enter Price" name="price">
                  </div>

                  <div class="form-group">
                    <label for="price">Coupon:</label>
                    <input type="text" class="form-control" value="{{$proposal->coupon}}" id="coupon" placeholder="Coupon" name="coupon">
                  </div>

                  <div class="form-group" style="display:none;">
                    <label for="time">Time:</label>
                    <input type="date" class="form-control" id="time" placeholder="Select Time" name="time">
                  </div>

                  <div class="form-group">
                    <label for="time">Attachments:</label>
                    <input type="file" multiple name="attachment[]" class="form-control">
                  </div>

                  @if($proposal_file)
                    <ul>
                      @foreach($proposal_file as $row)
                        <li><a href="{{ Storage::url('public/'.$row->file)}}" target="_blank">{{$row->file }}</a></li>
                      @endforeach
                    </ul>  
                  @endif
                  
                  <button type="submit" class="btn btn-default">Update</button>
                </form>
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
