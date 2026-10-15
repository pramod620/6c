<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p>
        <strong>ID:</strong>
        {{ $student->id }}
    </p>

    <p>
        <strong>Name:</strong>
        {{ $student->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $student->email }}
    </p>

    <p>
        <strong>Phone:</strong>
        {{ $student->phone }}
    </p>

    <p>
        <strong>Address:</strong>
        {{ $student->address ?? 'Not provided' }}
    </p>

    <p>
        <strong>Date of Birth:</strong>
        {{ $student->date_of_birth ?? 'Not provided' }}
    </p>

    <p>
        <strong>Created At:</strong>
        {{ $student->created_at }}
    </p>

    <p>
        <strong>Last Updated:</strong>
        {{ $student->updated_at }}
    </p>

    <a href="{{ route('students.edit', $student->id) }}">
        Edit Student
    </a>

    <br><br>

    <a href="{{ route('students.index') }}">
        Back to Students
    </a>
</body>
</html>
