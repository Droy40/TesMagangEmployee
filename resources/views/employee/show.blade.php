<a href="{{ route('employee.index') }}">Back to List</a>

<h2>Employee Details</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <td>{{ $employee->id }}</td>
    </tr>
    <tr>
        <th>Firstname</th>
        <td>{{ $employee->firstname }}</td>
    </tr>
    <tr>
        <th>Lastname</th>
        <td>{{ $employee->lastname ?? '-' }}</td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>{{ ucfirst($employee->gender) }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $employee->address }}</td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td>{{ $employee->dob }}</td>
    </tr>
    <tr>
        <th>Department</th>
        <td>{{ $employee->department->name ?? 'N/A' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ strtoupper($employee->status) }}</td>
    </tr>
</table>

<a href="{{ route('employee.edit', $employee->id) }}">Edit</a>
<form action="{{ route('employee.destroy', $employee->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this employee?');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
