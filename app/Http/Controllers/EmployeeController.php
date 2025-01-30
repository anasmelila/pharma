<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Report;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function register()
    {
        $departments = Department::all(); // Fetch all departments
        return view('register', compact('departments'));
    }

    public function list()
    {
        $employee = Employee::where('emp_id', auth()->user()->emp_id)->first();
        $emp_reports = Report::where('emp_id', auth()->user()->emp_id)->paginate(5);

        return view('list', compact('employee', 'emp_reports'));
    }

    public function addreport()
    {
        return view('addreport');
    }

    public function save()
    {
        request()->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:5',
            'dep_id' => 'required|exists:departments,dep_id'
        ]);

        Employee::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'dep_id' => request('dep_id')
        ]);

        return redirect()->route('login')->with('message', 'Employee Created Successfully !!!');
    }
}
