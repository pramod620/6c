
@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="page-header">
        <div>
            <h1>Students</h1>
            <p>Manage registered students.</p>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary">
            + Add Student
        </a>
    </div>

    <section class="card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td class="actions">
                                <a
                                    href="{{ route('students.show', $student) }}"
                                    class="btn btn-secondary"
                                >View</a>

                                <a
                                    href="{{ route('students.edit', $student) }}"
                                    class="btn btn-primary"
                                >Edit</a>

                                <x-delete-form
                                    :action="route('students.destroy', $student)"
                                    message="Delete this student?"
                                />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
