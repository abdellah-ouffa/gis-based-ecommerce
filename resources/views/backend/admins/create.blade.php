@extends('backend.layouts.master')

@section('title') Add new Admin @endsection

@section('content')
   <div class="page-head">
      <h2>Admin area</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Add new Admin</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('admin.index') }} " class="btn btn-success">List of admins</a>
                  </div>
                  <span class="title">Add new admin</span>
               </div>
               <div class="panel-body">
                  <form action="{{ route('admin.store') }}" method="post">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">First name</label>
                              <input type="text" name="first_name" class="form-control" placeholder="first name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Last name</label>
                              <input type="text" name="last_name" class="form-control" placeholder="last name">
                           </div>
                        </div>
                     </div>
                     
                     <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email" >
                     </div>

                     <div class="form-group">
                        <label for="">password</label>
                        <input type="password" name ="password" class="form-control" placeholder="Password">
                     </div>

                     <div class="form-group">
                        <label for="">Password verification</label>
                        <input type="password" name ="password_verification" class="form-control" placeholder="Repeat password">
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