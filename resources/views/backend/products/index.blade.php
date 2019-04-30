@extends('backend.layouts.master')

@section('title') Lister les produits @endsection

@section('content')
   <div class="page-head">
      <h2>Catalogue du produits</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">tableau de bord</a>
         </li>
         <li class="active">liste des produits</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <span class="title">Liste des produits</span>
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
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datatables/css/dataTables.bootstrap.min.css') }}"/>
@endsection

@section('plugins-javascript')
   <script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/lib/datatables/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
@endsection

@section('custom-javascript')
   <script>
      $(document).ready(function () {
         App.dataTables();
      });
   </script>
@endsection