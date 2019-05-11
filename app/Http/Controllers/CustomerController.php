<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Session;

class CustomerController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customers = Customer::all();
        return view('backend.customer.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$user= new User();
    	$user->first_name = $request->input('first_name');
    	$user->last_name = $request->input('last_name');
    	$user->email = $request->input('email');
    	$user->password = bcrypt($request->input('password'));
    	$user->role = 'customer';
        $user->save();

    	$customer = new Customer();
    	$customer->tel = $request->input('tel');
        $customer->gender = $request->input('gender');
        $customer->birth_date = $request->input('birth_date');
        $customer->user_id = $user->id;
        $customer->save();

        return redirect()-> route('customer.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$customer = Customer::findOrFail($id);
        
        return view('backend.customer.edit',[
            'customer' => $customer
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->user->first_name = $request->input('first_name');
        $customer->user->last_name = $request->input('last_name');
        $customer->user->email = $request->input('email');
        $customer->user->password = bcrypt($request->input('password'));
        $customer->user->role = 'customer';
        $customer->tel = $request->input('tel');
        $customer->gender = $request->input('gender');
        $customer->birth_date = $request->input('birth_date');
        $customer->user->save();
        $customer->save();
        Session::flash('success', 'Customer updated succesfully');

        return redirect()-> route('customer.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->user->delete();
        Session::flash('success', 'customer deleted succesfully');

        return redirect()->route('customer.index');   
    }
}
