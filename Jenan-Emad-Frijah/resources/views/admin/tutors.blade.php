@extends('layouts.admin')
@section ('title',' Tutors Table')
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
        <h1 class="mt-4">Tables</h1>
         <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                 <li class="breadcrumb-item active">Tutors Table</li>
          </ol>
          <div class="card mb-4">
            </div>
            <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span></span>
         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
  <i class="fas fa-plus"></i> Add New Tutor
</button>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
           {{session('success')}}
        </div>
        @endif
    <div class="card-body">
   <table  border="1" cellpadding="10" width="100%">
                              
 <thead>
    <tr>
        <th>Tutor Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Location</th>
        <th>Start date</th>
        <th>Actions</th>
    </tr>
</thead>

                                   
  <tbody>
@forelse($tutors as $tutor)
    <tr>
        <td>{{ $tutor->id??'—'  }}</td>
        <td>{{ $tutor->name??'—'  }}</td>
        <td>{{ $tutor->email??'—'  }}</td>
        <td>{{ $tutor->phone ?? '—' }}</td>
        <td>{{ $tutor->location ?? '—' }}</td>
        <td>{{ $tutor->created_at->format('Y/m/d') }}</td>
        <td><form action="{{route('admin.tutor_delete',$tutor->id)}}" method="POST" class="delete-tutor-form">
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
        <td colspan="6" class="text-center">No students found</td>
    </tr>
@endforelse
</tbody>
                                </table>
                            </div>
                        </div>
                    </div>



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add New Tutor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addTutorForm" action="{{route('admin.tutor_add')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="tutor_name" class="form-label">Tutor Name</label>
            <input type="text" name="name" id="tutor_name" class="form-control" placeholder="Enter tutor name" required>

            <label for="tutor_email" class="form-label">Tutor Email</label>
            <input type="email" name="email" id="tutor_email" class="form-control" placeholder="Enter tutor email" required>

            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="" required>

            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" placeholder="Amman-abdali" required>

            <label for="bio" class="form-label">Bio</label>
            <input type="text" name="bio" id="tutor_bio" class="form-control" placeholder="I am a Math graduate skilled in.." required>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" form="addTutorForm" class="btn btn-success">Add Tutor</button>
      </div>
    </div>
  </div>
</div>
<div class="mt-3">
   {{$tutors->links('pagination::bootstrap-4')}}
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-tutor-form').forEach(form => {
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

