@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Employee</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('employee.update', $employee->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname', $employee->firstname) }}">
                    @error('firstname') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $employee->lastname) }}">
                    @error('lastname') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input type="radio" name="gender" value="male" id="genderMale" class="form-check-input" {{ old('gender', $employee->gender) == 'male' ? 'checked' : '' }}>
                        <label for="genderMale" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gender" value="female" id="genderFemale" class="form-check-input" {{ old('gender', $employee->gender) == 'female' ? 'checked' : '' }}>
                        <label for="genderFemale" class="form-check-label">Female</label>
                    </div>
                    @error('gender') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $employee->address) }}">
                    @error('address') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $employee->dob) }}">
                    @error('dob') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select name="dept_id" id="department" class="form-select">
                        <option value="">-- Select Department --</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ old('dept_id', $employee->dept_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('dept_id') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">-- Select Status --</option>
                        @foreach ($status as $key => $value)
                            <option value="{{ $key }}" {{ old('status', $employee->status) == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                    @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
