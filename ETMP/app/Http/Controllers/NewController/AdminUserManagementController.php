<?php

namespace App\Http\Controllers\NewController;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffCount = User::where('role_id', '3')->count();
        $departmentCount = Department::count();
        $staffs =  User::where('role_id', '3')->get();
        return view('admin.management.index', compact('staffs', 'staffCount', 'departmentCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.management.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password= Hash::make(request('password'));
        $user->department = request('department');
        $user->company_name = 'EMTP';
        $user->role_id = '3';
        $user->email_verified_at = now();
        $user->save();
        // return $path;
        return redirect(route('admin.management.index'))->withToastSuccess($user->name.' has been Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $staff = User::findOrFail($id);
        return view('admin.management.details', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $staff = User::find($id);
        return view('admin.management.edit', compact('staff', 'departments'));
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
        $staff = User::findOrFail($id);
        $staff->name = $request->input('name');
        $staff->department = $request->input('department');
        $staff->update();

        return redirect(route('admin.management.index'))->withToastInfo($staff->name.'&apos;s details has been Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = User::findOrFail($id);
        $staff->delete();
        return redirect(route('admin.management.index'))->withToastError($staff->name.' has been deleted Successfully!');
    }
}
