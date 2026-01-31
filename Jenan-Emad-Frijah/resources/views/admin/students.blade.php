@extends('layouts.admin')
@section('title', 'Students Table')
@section('styles')
<style>
.page-item.active .page-link {
    background-color: #4C1D95 !important;
    border-color: #4C1D95 !important;
    color:white !important;
}
</style>
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Students</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Students Table</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered table-striped" border="1" cellpadding="8" width="100%">
                <thead>
                    <tr>
                        <th>Student Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Location</th>
                        <th>Start date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id ?? '-' }}</td>
                        <td>{{ $student->name ?? '-' }}</td>
                        <td>{{ $student->email ?? '--' }}</td>
                        <td>{{ $student->phone ?? '—' }}</td>
                        <td>{{ $student->location ?? '—' }}</td>
                        <td>{{ $student->created_at->format('Y/m/d') }}</td>
                        <td>
                            <form action="{{ route('admin.student_delete', $student->id) }}" method="POST" class="delete-student-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No students found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
      {{ $students->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-student-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

});
</script>
@endsection
