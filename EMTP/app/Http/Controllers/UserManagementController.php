<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class UserManagementController extends Controller
{
    public function AdminViewNewStaff()
    {
        $staffs =  DB::table('users')->where('usertype', 'staff')->get();
        return view('admin.management.view', ['staffs' => $staffs]);
    }

    public function AdminCreateNewStaffPage()
    {
        return view('admin.management.create');
    }

    public function AdminViewSpecificStaff(Request $request, $id)
    {
        $staff = User::findOrFail($id);
        return view('admin.management.details', ['staff'=>$staff]);

    }
}
