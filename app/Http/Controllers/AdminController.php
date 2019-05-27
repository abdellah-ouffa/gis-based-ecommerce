<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $admins = User::where('role','admin')->get();
     return view('backend.admins.index',[
        'admins'=> $admins
    ]);
 }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = new User();   
      $user->first_name = $request->input('first_name');   
      $user->last_name = $request->input('last_name');  
      $user->email = $request->input('email');  
      $user->password = bcrypt($request->input('password'));    
      $user->role = 'admin';  
      $user-> save();

      return redirect()->route('admin.index');
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
        $admin = User::findOrFail($id);
        return view('backend.admins.edit',[
            'admin' => $admin
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
     $admin = User::findOrFail($id);
     $admin->first_name = $request->input('first_name');
     $admin->last_name = $request->input('last_name');
     $admin->email = $request->input('email');
     $admin->role = 'admin';
     $admin->password = bcrypt($request->input('password'));

     $admin->save();
     Session::flash('success', 'Admin has beeen updated succesfully');
     return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $admin=User::findOrFail($id)->delete();
     Session::flash('success', 'admin deleted succesfully');
     return redirect()->route('admin.index');

    }
}
