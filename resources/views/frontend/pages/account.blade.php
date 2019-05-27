@extends('frontend.layouts.master')
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="active">My Account </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
               {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="ml-auto mr-auto col-lg-12">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>1 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h3>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <form action="{{ route('front.updateAccount') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="myaccount-info-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="{{ $customer->user->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="{{ $customer->user->last_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control" id="gender">
                                                            <option {{ $customer->gender == 'Female' ? "selected" : "" }} value="Female">Female</option>
                                                            <option {{ $customer->gender == 'Male' ? "selected" : "" }} value="Male">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Birth Date</label>
                                                        <input type="date" name="birth_date" value="{{-- {{ $customer->birth_date }} --}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Telephone</label>
                                                        <input type="text" name="tel" value="{{ $customer->tel }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email Address</label>
                                                        <input type="email" name="email" value="{{ $customer->user->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>2 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h3>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form action="{{ route('front.updatePassword') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="myaccount-info-wrapper">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password</label>
                                                        <input type="password" name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirmation</label>
                                                        <input type="password" name="confirmation_password" placeholder="Password Confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>3 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Your addresses </a></h3>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Address Book Entries</h4>
                                        </div>
                                        <div class="entries-wrapper">
                                            @forelse ($customer->addresses as $address)
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-info text-center">
                                                        <p>{{ $address->address }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-edit-delete text-center">
                                                        <form action= "{{ route('front.destroyAddress', ['id' => $address->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger{{-- btn-remove --}}">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <h4 class="text-center">No address found</h4>
                                            @endforelse
                                        </div>
                                        <div class="billing-back-btn">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>4 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-4">My orders </a></h3>
                            </div>
                            <div id="my-account-4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Customer name</th>
                                                    <th>Status</th>
                                                    <th>address</th>
                                                    <th>date of order</th>
                                                    <th>Additional info</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($customer->orders as $order)
                                                    <tr>
                                                        <td>{{ $order->customer->user->fullName }}</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>{{ $order->address->address }}</td>
                                                        <td>{{ $order->created_at }}</td>
                                                        <td>{{ $order->additionnal_information }}</td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#modal-show-order-details-{{ $order->id }}" class="btn btn-sm btn-info">Products</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @foreach($customer->orders as $order)
                                            <div class="modal fade" id="modal-show-order-details-{{ $order->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            Order details
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-striped table-bordered">
                                                                <tr>
                                                                    <th>Product name</th>
                                                                    <th>Category</th>
                                                                    <th>Price</th>
                                                                    <th>Qty</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                                @php $total = 0; @endphp
                                                                @foreach ($order->products as $product)
                                                                @php $total += $product->OrderDetail->qte * $product->price; @endphp
                                                                <tr>
                                                                    <td>{{ $product->name }}</td>
                                                                    <td>{{ $product->category->name }}</td>
                                                                    <td>{{ $product->price }}</td>
                                                                    <td>{{ $product->OrderDetail->qte }}</td>
                                                                    <td>{{numberToPriceFormat($product->OrderDetail->qte * $product->price) }}</td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <strong>Total</strong>
                                                                    </td>
                                                                    <td>{{ numberToPriceFormat($total) }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection