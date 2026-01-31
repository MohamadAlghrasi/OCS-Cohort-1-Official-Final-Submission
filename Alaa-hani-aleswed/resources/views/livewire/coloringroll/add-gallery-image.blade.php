<div>
    @auth
        @if ($orders->count())
            <div class="text-center mb-60" style="margin-bottom: 50px">
                <button class="it-btn circle-effect" data-bs-toggle="modal" data-bs-target="#galleryModal" >
                    <span>Add Your Experience</span>
                </button>
            </div>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="galleryModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Share Your Experience</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Order</label>
                                <select class="form-control" wire:model="selected">
                                    <option value="">Select Order & Product</option>

                                    @foreach ($orders as $order)
                                        @foreach ($order->items as $item)
                                            @php
                                                $product = $item->product ?? $item->variant?->product;
                                            @endphp

                                            @if ($product)
                                                <option value="{{ $order->id }}|{{ $product->id }}">
                                                    Order #{{ $order->id }} - {{ $product->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" wire:model="image">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Caption (optional)</label>
                                <textarea class="form-control" wire:model="caption"></textarea>
                            </div>

                            @error('*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button wire:click="submit" class="it-btn-sm">
                                <span>Submit</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endauth

</div>
