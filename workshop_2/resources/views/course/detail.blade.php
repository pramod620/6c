
@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
    <div class="page-header">
        <h1>Course Details</h1>

        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">
            Edit Course
        </a>
    </div>

    <section class="card detail-card">
        <p><strong>ID:</strong> {{ $course->id }}</p>
        <p><strong>Name:</strong> {{ $course->name }}</p>
        <p><strong>Description:</strong> {{ $course->description ?: 'Not provided' }}</p>
        <p><strong>Duration:</strong> {{ $course->duration }} weeks</p>
        <p><strong>Fee:</strong> {{ number_format((float) $course->fee, 2) }}</p>
        <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
        <p><strong>Status:</strong> {{ $course->is_active ? 'Active' : 'Inactive' }}</p>
        <p><strong>Created:</strong> {{ $course->created_at?->format('Y-m-d H:i') }}</p>
        <p><strong>Last Updated:</strong> {{ $course->updated_at?->format('Y-m-d H:i') }}</p>

        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
            Back to Courses
        </a>
    </section>
@endsection
