
@props([
    'action',
    'message' => 'Are you sure you want to delete this record?',
])

<form
    action="{{ $action }}"
    method="POST"
    class="inline-form"
    onsubmit="return confirm('{{ addslashes($message) }}')"
>
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">
        Delete
    </button>
</form>
