
@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
    <div class="page-header">
        <h1>Create Course</h1>
        <p>Add a new course to the institute.</p>
    </div>

    <section class="card">
        <form action="{{ route('courses.store') }}" method="POST">
            @include('course._form')
        </form>
    </section>
@endsection
