@extends('backend.layouts.master')

@section('title') List orders @endsection

@section('content')
   <div class="page-head">
      <h2>Orders catalogue</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Orders list</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{-- {{ route('customer.create') }} --}}" class="btn btn-success">SHOW DETAILS</a>
                  </div>
                  <span class="title">List of orders</span>
               </div>
               <div class="panel-body">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                     <thead>
                        <tr>
                           <th>Customer name</th>
                           <th>Status</th>
                           <th>address</th>
                           <th>date of order</th>
                           <th>Additional info</th>
                           <th>Tel</th>
                           <th>QT</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($orders as $order)
                           <tr>
                              <td>{{ $order->customer->user->fullName }}</td>
                              <td>{{ $order->status }}</td>
                              <td>
                                 @foreach ($order->products as $product)
                                    {{ $product->name }}
                                 @endforeach
                              </td>
                              <td>{{ $order->created_at }}</td>
                              <td>{{ $order->additionnal_information }}</td>
                              <td>{{ $order->customer->tel }}</td>
                              <td></td>
                              <td></td>

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