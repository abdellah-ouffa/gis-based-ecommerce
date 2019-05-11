
@extends('backend.layouts.master')

@section('title') List customers @endsection

@section('content')
   <div class="page-head">
      <h2>Customers catalogue</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Customers list</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('customer.create') }}" class="btn btn-success">Add new customer</a>
                  </div>
                  <span class="title">List of customers</span>
               </div>
               <div class="panel-body">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                     <thead>
                        <tr>
                           <th>First name</th>
                           <th>Last name</th>
                           <th>Email</th>
                           <th>TEL</th>
                           <th>Gender</th>
                           <th>Date of birth</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($customers as $customer)
                           <tr>
                              <td>{{ $customer->user->first_name }}</td>
                              <td>{{ $customer->user->last_name }}</td>
                              <td>{{ $customer->user->email }}</td>
                              <td>{{ $customer->tel }}</td>
                              <td>{{ $customer->gender }}</td>
                              <td>{{ $customer->birth_date->format('Y-m-d') }}</td>
                              <td>
                                 <a href=""class="btn btn-info">detail</a>
                                 <a href="{{url('customer/'.$customer->id.'/edit')}}" class="btn btn-success">Edit</a>
                                 <form data-resource-name="customer" class="form-remove" action="{{ route('customer.destroy', ['id' => $customer->id]) }}" id="form-delete-product-{{ $customer->id }}" method="POST">
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