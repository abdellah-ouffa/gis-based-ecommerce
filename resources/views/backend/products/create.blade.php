@extends('backend.layouts.master')
@section('title') Add new product @endsection
@section('content')
<div class="page-head">
   <h2>Manage products</h2>
   <ol class="breadcrumb">
      <li>
         <a href="#">tableau de bord</a>
      </li>
      <li class="active">New product</li>
   </ol>
</div>
<div class="main-content">
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-default panel-borders">
            <div class="panel-heading">
               <span class="title">Add new product</span>
            </div>
            <div class="panel-body">
               <form action="{{ route('product.store') }}" method="post" class="form-horizontal group-border-dashed">
                  @csrf
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Name</label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Category</label>
                     <div class="col-sm-6">
                        <select class="form-control" name="category_id">
                           @foreach ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Slug</label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="slug" placeholder="Slug">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Price</label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" placeholder="Price">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Description</label>
                     <div class="col-sm-6">
                        <textarea class="form-control" rows="10" placeholder="Description" name="description"></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-offset-3">
                        <button type="submit" class="btn btn-space btn-primary">Save</button>
                        <button class="btn btn-space btn-default">Cancel</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection