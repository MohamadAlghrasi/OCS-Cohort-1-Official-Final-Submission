<div>

    <div class="d-flex justify-content-between mb-3">
        <h4>Categories Management</h4>
        <button class="btn btn-success" wire:click="create">
            Add Category
        </button>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Parent</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <span style="padding-left: {{ $category->depth * 50 }}px">
                            {{ $category->name }}
                        </span>
                    </td>
                    <td>{{ $category->type }}</td>
                    <td>{{ $category->parent?->name ?? 'Main Category' }}</td>
                    <td>
                        <button class="btn btn-sm btn-success" wire:click="addSub({{ $category->id }})"  @if($category->products_count > 0) disabled @endif>
                            Add Sub
                        </button>
                        <button class="btn btn-sm btn-secondary" wire:click="edit({{ $category->id }})">
                            Edit
                        </button>

                        <button class="btn btn-sm btn-danger" wire:click="deleteConfirm({{ $category->id }})">
                            Delete
                        </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal --}}
    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $isEdit ? 'Edit Category' : 'Add Category' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    @if ($parent_id)
                        <div class="alert alert-info">
                            Adding sub category under:
                            <strong>
                                {{ \App\Models\Category::find($parent_id)?->name }}
                            </strong>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Parent Category</label>

                        @if ($parent_id)
                            <input type="text" class="form-control"
                                value="{{ \App\Models\Category::find($parent_id)?->name }}" disabled>
                        @else
                            <select wire:model="parent_id" class="form-control">
                                <option value="">Main Category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>



                    @if (!$parent_id)
                        <div class="form-group">
                            <label>Type</label>
                            <select wire:model="type" class="form-control">
                                <option value="simple">Simple</option>
                                <option value="rolls">Rolls</option>
                            </select>
                        </div>
                    @endif



                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    @if ($isEdit)
                        <button class="btn btn-primary" wire:click="update">Update</button>
                    @else
                        <button class="btn btn-success" wire:click="store">Save</button>
                    @endif
                </div>

            </div>
        </div>
    </div>

</div>
{{-- <script>
        document.addEventListener('open-modal', () => {
            $('#categoryModal').modal('show');
        });

        document.addEventListener('close-modal', () => {
            $('#categoryModal').modal('hide');
        });

        document.addEventListener('confirm-delete', () => {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This category will be deleted',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it'
            }).then(result => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete-category');
                }
            });
        });

        document.addEventListener('success', e => {
            Swal.fire('Success', e.detail.message, 'success');
        });

        document.addEventListener('error', e => {
            Swal.fire('Error', e.detail.message, 'error');
        });
    </script> --}}
