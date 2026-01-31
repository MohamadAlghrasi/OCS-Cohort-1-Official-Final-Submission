<div>
    
    <div class="row align-items-center mb-30">
        <div class="col-md-4 text-md-right it-product__text">
            <span>
                Showing {{ $products->count() }} of {{ $products->total() }} results
            </span>
        </div>
        <div class="col-md-4 mb-2">
            <input type="text" class="form-control" placeholder="Search products..." wire:model.live="search">
        </div>

        <div class="col-md-4 mb-2 it-product__filter">
            <select class="form-control" wire:model.change="category">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        
    </div>


    <div class="row">
        @forelse ($products as $product)
            @php
                $mainImage = $product->images->firstWhere('is_main', true);
            @endphp

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="it-shop-item text-center">
                    <div class="it-shop-thumb p-relative">
                        <img class="w-100"
                            src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('coloringRoll/img/shop/thumb-placeholder.jpg') }}"
                            alt="{{ $product->name }}">
                    </div>

                    <div class="it-shop-content">
                        <h4 class="it-shop-title pb-15">
                            <a href="{{ route('shop.details', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h4>

                        <div class="it-shop-rate mb-20">
                            <span class="color">
                                @if ($product->category?->type === 'simple')
                                    {{ $product->base_price }} JD
                                @else
                                    From {{ $product->variants->min('price') }} JD
                                @endif
                            </span>
                        </div>

                        <a class="it-btn-sm" href="{{ route('shop.details', $product->slug) }}">
                            <span>View Details</span>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No products found.</p>
            </div>
        @endforelse
    </div>
    <div class="row">
        <div class="col-12">
            <div class="basic-pagination text-center mt-35">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
