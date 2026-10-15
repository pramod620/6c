<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>
<body>
    <h1>Course Details</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p>
        <strong>ID:</strong>
        {{ $course->id }}
    </p>

    <p>
        <strong>Name:</strong>
        {{ $course->name }}
    </p>

    <p>
        <strong>Description:</strong>
        {{ $course->description ?? 'Not provided' }}
    </p>

    <p>
        <strong>Duration:</strong>
        {{ $course->duration }} weeks
    </p>

    <p>
        <strong>Fee:</strong>
        {{ number_format((float) $course->fee, 2) }}
    </p>

    <p>
        <strong>Difficulty:</strong>
        {{ $course->difficulty }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $course->is_active ? 'Active' : 'Inactive' }}
    </p>

    <p>
        <strong>Created At:</strong>
        {{ $course->created_at }}
    </p>

    <p>
        <strong>Last Updated:</strong>
        {{ $course->updated_at }}
    </p>

    <a href="{{ route('courses.edit', $course->id) }}">
        Edit Course
    </a>

    <br><br>

    <a href="{{ route('courses.index') }}">
        Back to Courses
    </a>
</body>
</html>
