
@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
    <div class="page-header">
        <h1>Student Details</h1>

        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">
            Edit Student
        </a>
    </div>

    <section class="card detail-card">
        <p><strong>ID:</strong> {{ $student->id }}</p>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Phone:</strong> {{ $student->phone }}</p>
        <p><strong>Address:</strong> {{ $student->address ?: 'Not provided' }}</p>

        <p>
            <strong>Date of Birth:</strong>
            {{ $student->date_of_birth?->format('Y-m-d') ?? 'Not provided' }}
        </p>

        <p>
            <strong>Age:</strong>
            {{ $student->age ?? 'Not available' }}
        </p>

        <p>
            <strong>Created:</strong>
            {{ $student->created_at?->format('Y-m-d H:i') }}
        </p>

        <p>
            <strong>Last Updated:</strong>
            {{ $student->updated_at?->format('Y-m-d H:i') }}
        </p>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Back to Students
        </a>
    </section>
@endsection
