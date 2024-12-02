<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use App\Models\Employee;
use App\Models\Position;
>>>>>>> 7635fea (modul 14)

class EmployeeController extends Controller
{
    public function index()
    {
        $pageTitle = 'Employee List';

<<<<<<< HEAD

        $employees = DB::table('employees')
            ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
            ->select('employees.*', 'positions.name as position_name', 'employees.id as employee_id')
            ->get();

        return view('employee.index', [
            'pageTitle' => $pageTitle,
            'employees' => $employees
        ]);
=======
    // ELOQUENT
    $employees = Employee::all();

    return view('employee.index', [
        'pageTitle' => $pageTitle,
        'employees' => $employees
    ]);

>>>>>>> 7635fea (modul 14)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $pageTitle = 'Create Employee';

<<<<<<< HEAD
        // Using Query Builder
        $positions = DB::table('positions')->get();
=======
        // ELOQUENT
        $positions = Position::all();
>>>>>>> 7635fea (modul 14)

        return view('employee.create', compact('pageTitle', 'positions'));
    }

<<<<<<< HEAD

    /**
     * Store a newly created resource in storage.
     */
=======
>>>>>>> 7635fea (modul 14)
    public function store(Request $request)
    {
    $messages = [
        'required' => ':Attribute harus diisi.',
        'email' => 'Isi :attribute dengan format yang benar',
        'numeric' => 'Isi :attribute dengan angka'
    ];

    $validator = Validator::make($request->all(), [
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // INSERT QUERY
    DB::table('employees')->insert([
        'firstname' => $request->firstName,
        'lastname' => $request->lastName,
        'email' => $request->email,
        'age' => $request->age,
        'position_id' => $request->position,
    ]);

    return redirect()->route('employees.index');
}
public function show(string $id)
{
    $pageTitle = 'Employee Detail';

    // Using Query Builder
    $employee = DB::table('employees')
        ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        ->select('employees.*', 'positions.name as position_name', 'employees.id as employee_id')
        ->where('employees.id', '=', $id)
        ->first();

    return view('employee.show', compact('pageTitle', 'employee'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Employee';

        // Get the employee and position data
        $employee = DB::table('employees')
            ->where('id', $id)
            ->first();

        $positions = DB::table('positions')->get();

        return view('employee.edit', compact('pageTitle', 'employee', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'position' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

<<<<<<< HEAD
        // Update employee data
        DB::table('employees')
            ->where('id', $id)
            ->update([
                'firstname' => $request->firstName,
                'lastname' => $request->lastName,
                'email' => $request->email,
                'age' => $request->age,
                'position_id' => $request->position,
            ]);

        return redirect()->route('employees.index');
    }
    public function destroy(string $id)
    {
        DB::table('employees')
        ->where('id', $id)
        ->delete();
        return redirect()->route('employees.index');
=======
        // ELOQUENT
        $employee = New Employee;
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();

        return redirect()->route('employees.index');
    }
    public function show(string $id)
    {
        $pageTitle = 'Employee Detail';

        // ELOQUENT
        $employee = Employee::find($id);

        return view('employee.show', compact('pageTitle', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Employee';

        // ELOQUENT
        $positions = Position::all();
        $employee = Employee::find($id);

        return view('employee.edit', compact('pageTitle', 'positions', 'employee'));
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $employee = Employee::find($id);
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function destroy(string $id)
    {
        // ELOQUENT
    Employee::find($id)->delete();

    return redirect()->route('employees.index');

>>>>>>> 7635fea (modul 14)

    }
}
