
@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="page-header">
        <h1>Edit Course</h1>
        <p>Update {{ $course->name }}.</p>
    </div>

    <section class="card">
        <form action="{{ route('courses.update', $course) }}" method="POST">
            @include('course._form')
        </form>
    </section>
@endsection
