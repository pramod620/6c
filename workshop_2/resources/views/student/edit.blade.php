
@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="page-header">
        <h1>Edit Student</h1>
        <p>Update the details for {{ $student->name }}.</p>
    </div>

    <section class="card">
        <form
            action="{{ route('students.update', $student) }}"
            method="POST"
        >
            @include('student._form')
        </form>
    </section>
@endsection
