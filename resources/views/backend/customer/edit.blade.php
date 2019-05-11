@extends('backend.layouts.master')

@section('title') Edit customer {{ $customer->user->fullName }} @endsection

@section('content')
   <div class="page-head">
      <h2>Customer change</h2>
      <ol class="breadcrumb">
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li class="active">Edit customer {{ $customer->user->fullName }}</li>
      </ol>
   </div>
   <div class="main-content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default panel-borders">
               <div class="panel-heading">
                  <div class="tools">
                     <a href="{{ route('customer.index') }}" class="btn btn-success">List of customers</a>
                  </div>
                  <span class="title">Edit customer {{ $customer->user->fullName }}</span>
               </div>
               <div class="panel-body">
                  <form action="{{ route('customer.update', ['id' => $customer->id])}}" method="post">
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">First name</label>
                              <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $customer->user->first_name }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Last name</label>
                              <input type="text" name="last_name" class="form-control" placeholder="Slug" value="{{ $customer->user->last_name }}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Gender</label>
                              <select name="gender" id="gender" class="form-control">
                                 <option {{ $customer->gender == "Female" ? "selected" : "" }} value="Female">Female</option>
                                 <option {{ $customer->gender == "Male" ? "selected" : "" }} value="Male">Male</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Date of birth</label>
                              <input type="date" name ="birth_date" class="form-control" placeholder="Date of birth" value="{{ $customer->birth_date->format('Y-m-d') }}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $customer->user->email }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">TEL</label>
                              <input type="text" name="tel" class="form-control" placeholder="TEL" value="{{ $customer->tel }}">
                           </div>
                        </div>
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
