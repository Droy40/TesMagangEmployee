<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',Employee::class);

        $employees = Employee::with('department')->get();

        $summaryStatus = DB::select("SELECT status, count(id)  as total_employee FROM employees GROUP BY status UNION SELECT 'Grand Total', count(id) FROM employees");

        $employeePerDepartment = DB::select("SELECT 
                d.name,
                SUM(CASE WHEN e.status = 'cont' THEN 1 ELSE 0 END) AS contract,
                SUM(CASE WHEN e.status = 'emp' THEN 1 ELSE 0 END) AS employee,
                SUM(CASE WHEN e.status = 'not_act' THEN 1 ELSE 0 END) AS not_active,
                COUNT(e.id) AS grand_total
            FROM departments d
            LEFT JOIN employees e ON d.id = e.dept_id
            GROUP BY d.id, d.name
        UNION 
            SELECT
                'Grand Total', 
                SUM(CASE WHEN e.status = 'cont' THEN 1 ELSE 0 END) AS contract,
                SUM(CASE WHEN e.status = 'emp' THEN 1 ELSE 0 END) AS employee,
                SUM(CASE WHEN e.status = 'not_act' THEN 1 ELSE 0 END) AS not_active,
                COUNT(e.id)
                from employees e;
        ");
        return view('employee.index', compact('employees', 'summaryStatus','employeePerDepartment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Employee::class);
        $departments = Department::all();
        $status = [
            'cont' => 'Contract',
            'emp' => 'Employee',
            'not_act' => 'Not Active'
        ];
        return view('employee.create', compact('departments', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Employee::class);
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['nullable', 'string', 'max:100'],
            'gender' => ['required', 'string', Rule::in('male', 'female')],
            'address' => ['required', 'string', 'max:100'],
            'dob' => ['required', 'date'],
            'dept_id' => ['required', 'exists:departments,id'],
            'status' => ['required', Rule::in(['cont', 'emp', 'not_act'])]
        ]);

        Employee::create($validated); // Langsung gunakan array yang sudah tervalidasi

        return redirect()->route('employee.index')->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('viewAny',Employee::class);
        $employee = Employee::with('department')->findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update',Employee::class);
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $status = [
            'cont' => 'Contract',
            'emp' => 'Employed',
            'not_act' => 'Not Active'
        ];

        return view('employee.edit', compact('employee', 'departments', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update',Employee::class);
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['nullable', 'string', 'max:100'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'address' => ['required', 'string', 'max:100'],
            'dob' => ['required', 'date'],
            'dept_id' => ['required', 'exists:departments,id'],
            'status' => ['required', Rule::in(['cont', 'emp', 'not_act'])]
        ]);

        $employee->update($validated);

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete',Employee::class);
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
    }
}
