
@csrf

@if ($course->exists)
    @method('PUT')
@endif

<x-form-input
    name="name"
    label="Course Name"
    :value="$course->name"
    required
/>

<x-form-textarea
    name="description"
    label="Description"
    :value="$course->description"
/>

<x-form-input
    name="duration"
    label="Duration (weeks)"
    type="number"
    :value="$course->duration"
    min="1"
    required
/>

<x-form-input
    name="fee"
    label="Course Fee"
    type="number"
    :value="$course->fee"
    min="0"
    step="0.01"
    required
/>

<div class="form-group">
    <label for="difficulty">Difficulty</label>

    <select
        id="difficulty"
        name="difficulty"
        class="form-control"
        required
    >
        <option value="">Select difficulty</option>

        @foreach (['Easy', 'Medium', 'Hard'] as $level)
            <option
                value="{{ $level }}"
                @selected(old('difficulty', $course->difficulty) === $level)
            >
                {{ $level }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group checkbox-group">
    <label>
        <input
            type="checkbox"
            name="is_active"
            value="1"
            @checked(old('is_active', $course->exists ? $course->is_active : true))
        >
        Course is active
    </label>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">
        {{ $course->exists ? 'Update Course' : 'Create Course' }}
    </button>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary">
        Cancel
    </a>
</div>
