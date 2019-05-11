@extends('backend.layouts.master')

@section('title') Edit category {{ $categories->name }} @endsection

@section('content')
   <div class="page-head">
      <h2>Catgories catalogue</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Edit category {{ $categories->name }}</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('category.index') }}" class="btn btn-success">List of categories</a>
                  </div>
                  <span class="title">Edit category {{ $categories->name }}</span>
               </div>
               <div class="panel-body">
                  <form action="{{ route('category.update', ['id' => $categories->id])}}" method="post">
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control" placeholder="name" value="{{ $categories->name }}">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <input type="reset" class="btn btn-default" value="Cancel">
                     </div>
                  </form>
                  </div>
            </div>
         </div>
      </div>
   </div>
@endsection