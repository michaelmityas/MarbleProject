<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Attendance;
use App\Deduct;
use App\Employee;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = Employee::all();
        return view('employee.show', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'empName'   => 'required',
            'empSalary' => 'required',
            'empJob'    => 'required'
        ]);

        $addEmp = new Employee;
        $addEmp->name           = $request->input('empName');
        $addEmp->salary_per_day = $request->input('empSalary');
        $addEmp->job            = $request->input('empJob');
        $addEmp->save();

        return redirect(route('employees.index'));
    }

    public function storeAttend(Request $request)
    {
        foreach($request->input('checkAttend') as $checked){
            $addAttend = new Attendance;
            $addAttend->employees_id = $checked;
            $addAttend->attendance = 1;
            $addAttend->save();
        }
        return redirect(url('/attendance'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $show = Employee::all();
        return view('employee.empAttend', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataEmp = Employee::find($id);
        return view('employee.edit', compact('dataEmp'));
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
        $update = Employee::find($id);
        $update->name           = $request->input('empName');
        $update->job            = $request->input('empJob');
        $update->salary_per_day = $request->input('empSalary');
        $update->save();

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delEmp = Employee::find($id);
        $delEmp->delete();

        return redirect(route('employees.index'));
    }
    public function showAttendDur()
    {
        return view('employee.empAttendDur');
    }

    public function getAttendance(Request $request)
    {
        // dd($request);        
        $from =  new \DateTime($request->input('from'));
        $from = $from->getTimestamp();
        $from = date('Y-m-d', $from);
        $to   = new \DateTime($request->input('to'));
        $to   = $to->getTimestamp();
        $to = date('Y-m-d', $to);

        $attendanceDuration = DB::table('employees')
        ->join('attendances', 'employees.id', '=', 'attendances.employees_id')
        ->whereBetween('attendances.created_at', [$from, $to])
        ->select('employees.id', 'employees.name', DB::raw('COUNT(attendances.employees_id) as attend_count'))
        ->groupBy('attendances.employees_id')
        ->get();
        
        return view('employee.empAttendDur', compact(['attendanceDuration', 'from', 'to']));
    }

    public function addLoan()
    {
        $employees = Employee::all();
        return view('employee.loan', compact('employees'));
    }

    public function storeLoan(Request $request)
    {
        $employees = new Deduct;
        $employees->type = 0; // 0 means loan not deduct
        $employees->amount = $request->input('amount');
        $employees->employees_id = $request->input('employee');
        $employees->save();

        return redirect(route('employees.index'));
    }

    public function addDeduct()
    {
        $employees = Employee::all();
        return view('employee.deduct', compact('employees'));
    }

    public function storeDeduct(Request $request)
    {
        $deduct = new Deduct;
        $deduct->type = 1; // 1 means deduct not loan
        $deduct->amount = $request->input('amount');
        $deduct->employees_id = $request->input('employee');
        $deduct->save();

        return redirect(route('employees.index'));
    }
}
