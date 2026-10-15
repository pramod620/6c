
@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <div class="page-header">
        <div>
            <h1>Courses</h1>
            <p>Manage available training courses.</p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            + Add Course
        </a>
    </div>

    <section class="card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Fee</th>
                        <th>Difficulty</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->duration }} weeks</td>
                            <td>{{ number_format((float) $course->fee, 2) }}</td>
                            <td>{{ $course->difficulty }}</td>
                            <td>
                                <span class="status {{ $course->is_active ? 'active' : 'inactive' }}">
                                    {{ $course->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="actions">
                                <a
                                    href="{{ route('courses.show', $course) }}"
                                    class="btn btn-secondary"
                                >View</a>

                                <a
                                    href="{{ route('courses.edit', $course) }}"
                                    class="btn btn-primary"
                                >Edit</a>

                                <x-delete-form
                                    :action="route('courses.destroy', $course)"
                                    message="Delete this course?"
                                />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
