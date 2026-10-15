
<nav class="navbar">
    <a class="brand" href="{{ route('students.index') }}">
        Training Institute
    </a>

    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('students.create') }}">Add Student</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('courses.create') }}">Add Course</a>
    </div>
</nav>
