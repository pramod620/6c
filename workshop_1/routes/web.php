<?php

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('students.index');
});

/*
|--------------------------------------------------------------------------
| Student CRUD
|--------------------------------------------------------------------------
*/

// List students
Route::get('/students', function () {
    $students = Student::latest()->get();

    return view('student.list', compact('students'));
})->name('students.index');

// Show create form
Route::get('/students/create', function () {
    return view('student.create');
})->name('students.create');

// Save new student
Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return redirect()
        ->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");
})->name('students.store');

// View student
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.detail', compact('student'));
})->name('students.show');

// Show edit form
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.edit', compact('student'));
})->name('students.edit');

// Update student
Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students', 'email')->ignore($student->id),
        ],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect()
        ->route('students.show', $student->id)
        ->with('success', 'Student updated successfully!');
})->name('students.update');

// Delete student
Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect()
        ->route('students.index')
        ->with('success', 'Student deleted successfully!');
})->name('students.destroy');

/*
|--------------------------------------------------------------------------
| Course CRUD
|--------------------------------------------------------------------------
*/

// List courses
Route::get('/courses', function () {
    $courses = Course::latest()->get();

    return view('course.list', compact('courses'));
})->name('courses.index');

// Show create form
Route::get('/courses/create', function () {
    return view('course.create');
})->name('courses.create');

// Save new course
Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:2000',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'nullable|boolean',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $course = Course::create($validated);

    return redirect()
        ->route('courses.index')
        ->with('success', "Course {$course->name} created successfully!");
})->name('courses.store');

// View course
Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.detail', compact('course'));
})->name('courses.show');

// Show edit form
Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.edit', compact('course'));
})->name('courses.edit');

// Update course
Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:2000',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'nullable|boolean',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $course->update($validated);

    return redirect()
        ->route('courses.show', $course->id)
        ->with('success', 'Course updated successfully!');
})->name('courses.update');

// Delete course
Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    $course->delete();

    return redirect()
        ->route('courses.index')
        ->with('success', 'Course deleted successfully!');
})->name('courses.destroy');
