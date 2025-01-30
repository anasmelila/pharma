<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Report;

class AdminController extends Controller
{
    public function adminlist(Request $request)
    {
        // Get all departments for the dropdown
        $departments = Department::all();

        // Check if a department filter is applied
        $query = Report::with('employee.department');

        if ($request->has('department_id') && $request->department_id != '') {
            $query->whereHas('employee', function ($query) use ($request) {
                $query->where('dep_id', $request->department_id);
            });
        }

        $emp_reports = $query->paginate(5);

        return view('adminlist', compact('emp_reports', 'departments'));
    }

    public function adminlogin()
    {
        return view('adminlogin');
    }

    public function adminlogout()
    {
        auth()->guard('admins')->logout(); // Logout the user
        return redirect()->route('adminlogin'); // Redirect to login page
    }

    public function admindoLogin()
    {
        $input = ['email' => request('email'), 'password' => request('password')];

        if (auth()->guard('admins')->attempt($input)) {
            return redirect()->route('adminlist');
        } else {
            return redirect()->route('adminlogin')->with('message', 'Login is Invalid');
        }
    }
}
