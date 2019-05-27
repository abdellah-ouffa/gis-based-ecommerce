@extends('backend.layouts.master')

@section('title') Edit admin {{ $admin->fullName }} @endsection

@section('content')
   <div class="page-head">
      <h2>Change admins</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Edit admin {{ $admin->fullName }}</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('admin.index') }}" class="btn btn-success">List of admins</a>
                  </div>
                  <span class="title">Edit admin {{ $admin->fullName }}</span>
               </div>
               <div class="panel-body">
                  <form action="{{ route('admin.update', ['id' => $admin->id])}}" method="post">
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">First name</label>
                              <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $admin->first_name }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Last name</label>
                              <input type="text" name="last_name" class="form-control" placeholder="Slug" value="{{ $admin->last_name }}">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $admin->email }}">
                     </div>
                     <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name ="password" class="form-control" placeholder="Password" value="">
                     </div>
                     <div class="form-group">
                        <label for="">Verification password</label>
                        <input type="password" name ="verification password" class="form-control" placeholder="Verification of password" >
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