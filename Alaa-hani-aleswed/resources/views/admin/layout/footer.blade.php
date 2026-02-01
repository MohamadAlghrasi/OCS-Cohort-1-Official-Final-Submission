    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    {{-- livewire --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('open-modal', () => {
            $('#categoryModal').modal('show');
        });

        window.addEventListener('close-modal', () => {
            $('#categoryModal').modal('hide');
        });
        window.addEventListener('confirm-delete', () => {
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

        window.addEventListener('success', e => {
            Swal.fire('Success', e.detail.message, 'success');
        });

        window.addEventListener('error', e => {
            Swal.fire('Error', e.detail.message, 'error');
        });

        window.addEventListener('open-modal', () => {
            $('#productModal').modal('show');
        });
        window.addEventListener('close-modal', () => {
            $('#productModal').modal('hide');
        });

        window.addEventListener('open-variant-modal', () => {
            $('#variantModal').modal('show');
        });
        window.addEventListener('close-variant-modal', () => {
            $('#variantModal').modal('hide');
        });
         window.addEventListener('confirm-delete-variant', () => {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This variant will be deleted',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete-variant');
            }
        });
    });
    window.addEventListener('confirm-delete-product', () => {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This product will be deleted',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete-product');
            }
        });
    });
    </script>


    @yield('script')
