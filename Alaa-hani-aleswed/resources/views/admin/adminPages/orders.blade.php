@extends('admin.layout.master')

@section('title', 'Order Page')

@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <h4 class="mb-4">Orders Management</h4>




        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Orders Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#Order ID</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>

                                    <td>{{ $order->address->name ?? $order->user->name }}</td>

                                    <td>{{ $order->address->email ?? $order->user->email }}</td>

                                    <td>{{ $order->total_price }} JD</td>

                                    <td>
                                        @if ($order->status === 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif ($order->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Failed</span>
                                        @endif
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#orderModal{{ $order->id }}">
                                            View
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($orders as $order)
<div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Order #{{ $order->id }} Details</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h6>Customer Information</h6>
                <p>
                    <strong>Name:</strong> {{ $order->address->name ?? $order->user->name }} <br>
                    <strong>Email:</strong> {{ $order->address->email ?? $order->user->email }} <br>
                    <strong>Phone:</strong> {{ $order->address->phone }}
                </p>

                <hr>

                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Variant</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            @php
                                $product = $item->product ?? $item->variant?->product;
                            @endphp
                            <tr>
                                <td>{{ $product?->name }}</td>
                                <td>
                                    @if ($item->variant)
                                        @foreach ($item->variant->values as $value)
                                            {{ $value->value }}{{ $value->attribute->unit }}
                                            @if (!$loop->last) × @endif
                                        @endforeach
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price * $item->quantity }} JD</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <p class="text-right">
                    <strong>Total:</strong> {{ $order->total_price }} JD
                </p>
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
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
