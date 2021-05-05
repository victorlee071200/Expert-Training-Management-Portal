<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class AdminUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs =  DB::table('users')->where('usertype', 'staff')->get();
        $clients =  DB::table('users')->where('usertype', 'client')->get();
        $admins =  DB::table('users')->where('usertype', 'admin')->get();
        return view('admin.users.index',['staffs'=>$staffs, 'clients'=>$clients, 'admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.users.create', ['departments'=> $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = new User;
        $staff->name = request('name');
        $staff->email = request('email');
        $staff->password = request('password');
        $staff->department = request('department');
        $staff->company_name = ('EMTP');
        $staff->usertype = ('staff');
        $staff->save();
        // return $path;
        return redirect(route('admin.users.index'))->withToastSuccess($staff->name.' Created Successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',['user'=>$user]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        User::destroy($id);
        return redirect(route('admin.users.index'))->withToastError($user->name.' Deleted Successfully!');;
    }
}
