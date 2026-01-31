<div>
    <div class="d-flex justify-content-between mb-3">
        <h4>Products Management</h4>
        {{-- <button class="btn btn-success" wire:click="$dispatch('open-modal')"> --}}
        <button class="btn btn-success" wire:click="create">
            Add New Product
        </button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Base Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @php
                            $mainImage = $product->images->firstWhere('is_main', true);
                        @endphp

                        @if ($mainImage)
                            <img src="{{ asset('storage/' . $mainImage->image_path) }}" width="60" class="rounded">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category?->name }}</td>
                    <td>
                        @if ($product->category?->type === 'simple')
                            {{ $product->base_price }} JD
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-secondary" wire:click="edit({{ $product->id }})">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger"
                            wire:click="confirmDeleteProduct({{ $product->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Add Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $product_id ? 'Edit Product' : 'Add Product' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" wire:model="category_id">
                                <option value="">Select category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">
                                        {{ $cat->full_path }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <hr>
                        <h5>Product Images</h5>
                        {{-- Existing images (edit only) --}}
                        @if ($existingImages)
                            <div class="row mb-3">
                                @foreach ($existingImages as $img)
                                    <div class="col-3 text-center mb-2">
                                        <img src="{{ asset('storage/' . $img->image_path) }}"
                                            class="img-fluid rounded mb-1">

                                        @if ($img->is_main)
                                            <span class="badge bg-primary">Main</span>
                                        @else
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="deleteImage({{ $img->id }})">
                                                Delete
                                            </button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        {{-- Upload images --}}
                        <div class="form-group">
                            <label>Upload Images</label>
                            <input type="file" class="form-control" wire:model="images" multiple>
                        </div>


                        @if ($categoryType === 'simple')
                            <div class="form-group">
                                <label>Base Price</label>
                                <input type="number" step="0.01" class="form-control" wire:model.defer="base_price">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>

                    </form>
                    @if ($categoryType === 'rolls' && $product_id)

                        <hr>
                        <h5>Roll Variants</h5>

                        <button class="btn btn-sm btn-success mb-2" wire:click="openVariantModal">
                            Add Variant
                        </button>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Length</th>
                                    <th>Width</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variants as $variant)
                                    <tr>
                                        <td>
                                            {{ optional($variant->values->firstWhere('attribute.name', 'length'))->value }}
                                        </td>
                                        <td>
                                            {{ optional($variant->values->firstWhere('attribute.name', 'width'))->value }}
                                        </td>
                                        <td>{{ $variant->price }} JD</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="confirmDeleteVariant({{ $variant->id }})">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" id="variantModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Add Variant</h5>
                </div>

                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @foreach ($productAttributes as $attribute)
                        <div class="form-group">
                            <label>{{ $attribute->label }}</label>
                            <select class="form-control" wire:model="selectedAttributes.{{ $attribute->id }}">
                                <option value="">Select</option>
                                @foreach ($attribute->values as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->value }} {{ $attribute->unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" class="form-control" wire:model.defer="variant_price">
                    </div>

                    <button class="btn btn-primary" wire:click="saveVariant">
                        Save Variant
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
