    
@extends('backend.layouts.master')

@section('title') List of products @endsection

@section('content')
   <div class="page-head">
      <h2>products catalogue </h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">dashboard</a>
         </li>
         <li class="active">Products list</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('product.create') }}" class="btn btn-success">Add new product</a>
                  </div>
                  <span class="title">Products list</span>
               </div>
               <div class="panel-body">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Slug</th>
                           <th>Price</th>
                           <th>Status</th>
                           <th>Category</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($products as $product)
                           <tr>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->slug }}</td>
                              <td>{{ $product->price }}</td>
                              <td>{{ $product->status }}</td>
                              <td>{{ $product->category->name }}</td>
                              <td>
                                 <a href=""class="btn btn-info">detail</a>
                                 <a href="{{url('product/'.$product->id.'/edit')}}" class="btn btn-success">Edit</a>
                                 <form data-resource-name="product" class="form-remove" action="{{ route('product.destroy', ['id' => $product->id]) }}" id="form-delete-product-{{ $product->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-remove">Delete</button>
                                 </form>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
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