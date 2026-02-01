@extends('admin.layout.master')

@section('title', 'Users Page')

@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <h4 class="mb-4">Users Management</h4>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Orders Count</th>
                                <th>Joined At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>#{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->orders_count }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>

                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#viewUser{{ $user->id }}">
                                            View
                                        </button>

                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                    @foreach ($users as $user)
                        <div class="modal fade" id="viewUser{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">User Details</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <p><strong>Name:</strong> {{ $user->name }}</p>
                                        <p><strong>Email:</strong> {{ $user->email }}</p>
                                        <p><strong>Orders:</strong> {{ $user->orders_count }}</p>

                                        @if ($user->profile)
                                            <p><strong>Phone:</strong> {{ $user->profile->phone }}</p>
                                            <p><strong>City:</strong> {{ $user->profile->city }}</p>
                                            <p><strong>Address:</strong> {{ $user->profile->address }}</p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {

        const form = this.closest('.delete-form');

        Swal.fire({
            title: 'Are you sure?',
            text: "This user will be deleted!",
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
</script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Done',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endsection

