@extends('backend.layouts.master')

@section('title') Edit product {{ $product->name }} @endsection

@section('content')
   <div class="page-head">
      <h2>Catalogue du produits</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">tableau de bord</a>
         </li>
         <li class="active">Edit product {{ $product->name }}</li>
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
                  <span class="title">Edit product {{ $product->name }}</span>
               </div>
               <div class="panel-body">
                  <form action="{{ route('product.update', ['id' => $product->id])}}" method="post">
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control" placeholder="name" value="{{ $product->name }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Slug</label>
                              <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id">
                           @foreach ($categories as $category)
                              <option {{ $product->category_id == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                     </div>
                     <div class="form-group">
                        <label for="">Status</label>
                        <input type="text" name ="status" class="form-control" placeholder="Status" value="{{ $product->status }} ">
                     </div>
                     <div class="form-group">
                        <label for="">Description</label>
                        <textarea name ="description" class="form-control" placeholder="Description">{{ $product->description }}</textarea>
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