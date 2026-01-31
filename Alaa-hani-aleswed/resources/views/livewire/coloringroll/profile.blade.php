<div class="container pt-100 pb-100">

    {{-- Tabs --}}
    <ul class="nav nav-tabs mb-40">
    <li class="nav-item">
        <button
            class="nav-link {{ $activeTab === 'profile' ? 'active' : '' }}"
            wire:click="$set('activeTab', 'profile')">
            Profile
        </button>
    </li>

    <li class="nav-item">
        <button
            class="nav-link {{ $activeTab === 'orders' ? 'active' : '' }}"
            wire:click="$set('activeTab', 'orders')">
            My Orders
        </button>
    </li>
</ul>


    <div class="tab-content">

        {{-- PROFILE TAB --}}
         @if ($activeTab === 'profile')
        <div class="tab-pane active show">
            <div class="row">
                <div class="col-lg-6">

                    <h4 class="mb-30">My Profile</h4>

                    <div class="checkout-form-list mb-20">
                        <label>Name</label>
                        <input type="text" wire:model="name" readonly>
                    </div>

                    <div class="checkout-form-list mb-20">
                        <label>Email</label>
                        <input type="email" wire:model="email" readonly>
                    </div>

                    <hr>

                    <h5 class="mb-20">Last Shipping Address</h5>

                    <div class="checkout-form-list mb-20">
                        <label>Phone</label>
                        <input type="text" wire:model="phone">
                    </div>

                    <div class="checkout-form-list mb-20">
                        <label>Country</label>
                        <input type="text" wire:model="country">
                    </div>

                    <div class="checkout-form-list mb-20">
                        <label>City</label>
                        <input type="text" wire:model="city">
                    </div>

                    <div class="checkout-form-list mb-20">
                        <label>Address</label>
                        <input type="text" wire:model="address">
                    </div>
                    <button wire:click="saveProfile" class="it-btn circle-effect mt-20">
                        <span>Save Changes</span>
                    </button>

                    @if (session()->has('success'))
                        <div class="alert alert-success mt-20">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>

            </div>
        </div>
        @endif

        {{-- ORDERS TAB --}}
         @if ($activeTab === 'orders')
        <div class="tab-pane active show">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
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
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse"
                                        data-bs-target="#order-{{ $order->id }}">
                                        View
                                    </button>
                                </td>
                            </tr>

                            <tr class="collapse" id="order-{{ $order->id }}">
                                <td colspan="5">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Variant</th>
                                                <th>Qty</th>
                                                <th>Price</th>
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
                                                                @if (!$loop->last)
                                                                    ×
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            —
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->price }} JD</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No orders yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-30">
                    {{ $orders->links() }}
                </div>
            </div>

        </div>
        @endif

    </div>
</div>
