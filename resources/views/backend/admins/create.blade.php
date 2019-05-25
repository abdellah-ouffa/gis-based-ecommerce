@extends('backend.layouts.master')

@section('title') Add new Admin @endsection

@section('content')
   <div class="page-head">
      <h2>Customers area</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">tableau de bord</a>
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
                     <a href="{{-- {{ route('customer.index') }} --}}" class="btn btn-success">List of customers</a>
                  </div>
                  <span class="title">Add new customer</span>
               </div>
               <div class="panel-body">
                  <form action="{{url('admin')}}" method="post" >
                     {{ csrf_field() }}
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
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Gender</label>
                              <select name="gender" id="gender" class="form-control">
                                 <option value="Female">Female</option>
                                 <option value="Male">Male</option>
                              </select>
                           </div>
                        </div>
                        
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" name="email" class="form-control" placeholder="email" >
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">TEL</label>
                              <input type="text" name="tel" class="form-control" placeholder="Phone number">
                           </div>
                        </div>
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