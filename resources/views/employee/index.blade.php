@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Employee List</h2>
        @can('create', App\Models\Employee::class)
            <a href="{{ route('employee.create') }}" class="btn btn-primary">Insert</a>
        @endcan
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Address</th>
                <th>DOB</th>
                <th>DEPT</th>
                <th>STATUS</th>
                @can('update', App\Models\Employee::class)
                    <th>Edit</th>
                @endcan
                @can('delete', App\Models\Employee::class)
                    <th>Delete</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->firstname }}</td>
                    <td>{{ $employee->lastname ?? '-' }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->department->name ?? '-' }}</td>
                    <td>{{ strtoupper($employee->status) }}</td>
                    @can('update', $employee)
                        <td>
                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    @endcan
                    @can('delete', $employee)
                        <td>
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="post" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="mt-4">Summary Status</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Status</th>
                <th>Total Employee</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($summaryStatus as $value)
                <tr>
                    <td>{{ $value->status }}</td>
                    <td>{{ $value->total_employee }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="mt-4">Employees Per Department</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Dept</th>
                <th>Contract</th>
                <th>Employee</th>
                <th>Not Active</th>
                <th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employeePerDepartment as $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->contract }}</td>
                    <td>{{ $value->employee }}</td>
                    <td>{{ $value->not_active }}</td>
                    <td>{{ $value->grand_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
