
@extends('backend.layouts.master')

@section('title') List admins @endsection

@section('content')
   <div class="page-head">
      <h2>admins catalogue</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Admin list</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('admin.create') }}" class="btn btn-success">Add new Admin</a>
                  </div>
                  <span class="title">List of admins</span>
               </div>
               <div class="panel-body">
                  <table id="table1" class= "table table-striped table-hover table-fw-widget ">
                     <thead>
                        <tr>
                           <th>First name</th>
                           <th>Last name</th>
                           <th>Email</th>
                           <th>Actions</th>

                        </tr>
                     </thead>
                     <tbody>
                        @foreach($admins as $admin)
                           <tr>
                              <td>{{ $admin->first_name }}</td>
                              <td>{{ $admin->last_name }}</td>
                              <td>{{ $admin->email }}</td>
                              <td>
                                 <a href="" class="btn btn-info">detail</a>
                                 <a href="{{url('admin/admin/'.$admin->id.'/edit')}}" class="btn btn-success ">Edit</a>
                                 <form data-resource-name="admin" class="form-remove" action="{{ route('admin.destroy', ['id' => $admin->id]) }}" id="form-delete-product-{{ $admin->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-remove">Delete</button>
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