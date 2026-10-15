
@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    <div class="page-header">
        <h1>Create Student</h1>
        <p>Add a new student to the system.</p>
    </div>

    <section class="card">
        <form
            action="{{ route('students.store') }}"
            method="POST"
        >
            @include('student._form')
        </form>
    </section>
@endsection
