@extends('backend.layouts.master')

@section('title') Add new product @endsection

@section('content')
   <div class="page-head">
      <h2>Products catalogue</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Add new product</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('product.index') }}" class="btn btn-success">List of products</a>
                  </div>
                  <span class="title">Add new product</span>
               </div>
               <div class="panel-body">
                  <form action="{{url('product')}}" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control" placeholder="name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Slug</label>
                              <input type="text" name="slug" class="form-control" placeholder="Slug">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id">
                           @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price" >
                     </div>
                     <div class="form-group">
                        <label for="">Status</label>
                        <input type="text" name ="status" class="form-control" placeholder="Status">
                     </div>
                     <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" multiple name="images[]" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Description</label>
                        <textarea name ="description" rows="5" class="form-control"></textarea>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
                        <input type="reset" class="btn btn-default" value="Cancel">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

@section('plugins-css')
   <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/datatables/css/dataTables.bootstrap.min.css') }}"/>
@endsection

@section('plugins-javascript')
   <script src="{{ asset('backend/assets/lib/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('backend/assets/lib/datatables/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
@endsection

@section('custom-javascript')
   <script>
      $(document).ready(function () {
         App.dataTables();
      });
   </script>
@endsection