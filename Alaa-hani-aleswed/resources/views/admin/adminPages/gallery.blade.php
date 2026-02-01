@extends('admin.layout.master')

@section('title', 'Gallery')

@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Gallery Management</h1>

<div class="row">
    @forelse ($images as $image)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm h-100">

                <img src="{{ asset('storage/' . $image->image_path) }}"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <h6 class="mb-1">{{ $image->product->name }}</h6>
                    <small class="text-muted">
                        By {{ $image->user->name }}
                    </small>

                    <div class="mt-2">
                        @if ($image->status === 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif ($image->status === 'approved')
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-danger">Rejected</span>
                        @endif
                    </div>

                    @if ($image->caption)
                        <p class="small mt-2 text-muted">
                            "{{ $image->caption }}"
                        </p>
                    @endif
                </div>

                <div class="card-footer bg-white d-flex justify-content-between">
                    <button class="btn btn-sm btn-outline-primary"
                            data-toggle="modal"
                            data-target="#imageModal{{ $image->id }}">
                        View
                    </button>

                    @if ($image->status === 'pending')
                        <div>
                            <form action="{{ route('admin.gallery.approve', $image) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-success">✔</button>
                            </form>

                            <form action="{{ route('admin.gallery.reject', $image) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-danger">✖</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Gallery Image</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             class="img-fluid mb-3">

                        <p><strong>User:</strong> {{ $image->user->name }}</p>
                        <p><strong>Product:</strong> {{ $image->product->name }}</p>
                        <p><strong>Order ID:</strong> #{{ $image->order_id }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($image->status) }}</p>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <div class="col-12 text-center">
            <p>No gallery images found.</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $images->links() }}
</div>

@endsection
@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
