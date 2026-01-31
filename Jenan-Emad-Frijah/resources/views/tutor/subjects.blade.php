@extends('layouts.tutor')
@section('title','Subjects Table')
@section('content')
  <div class="container-fluid px-4">

    <h1 class="mt-4">Tables</h1>
           <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Subjects Table</li>
                        </ol>
                        <div class="card mb-4">
                        </div>
                        <div class="card mb-4">               
      <div class="card-header d-flex justify-content-between align-items-center">
        <span></span>
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
  <i class="fas fa-plus"></i> Add New Subject
</button>
        </div>
         <div class="card-body">
           <table class="table table-bordered">
    <thead>
        <tr>
            <th>Subject</th>
            <th>Price per Hour</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
<tbody>
@foreach($tutor->subjects as $subject)
<tr>
    <td>{{ $subject->name }}</td>
    <td>{{ $subject->pivot->price_per_hour ?? 'N/A' }}</td>
    <td>{{ $subject->description ?? '-' }}</td>
    <td>
        <button class="btn btn-sm btn-primary" onclick='openEditModal(@json($subject))'>
            Edit
        </button>

        <form action="{{ route('tutor.subject_delete', [$tutor->id, $subject->id]) }}" method="POST" class="delete-subject-form" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

</table>
 </div>
 </div>
</div>
                

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true"> 
  <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <h5 class="modal-title">Add New Subject</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
          <span>&times;</span> 
        </button> 
      </div> 
      <div class="modal-body"> 
        <form id="addSubjectForm" action="{{ route('tutor.subject_add') }}" method="POST"> 
          @csrf 
          <div class="mb-3"> 
            <label for="subject_name" class="form-label">Subject Name</label> 
            <select name="name" id="subject_name" class="form-control" required> 
              <option value="" disabled selected>Select subject</option> 
              <option value="Arabic">Arabic</option> 
              <option value="English">English</option> 
              <option value="Mathematics">Mathematics</option> 
              <option value="Physics">Physics</option> 
              <option value="Chemistry">Chemistry</option> 
              <option value="Biology">Biology</option> 
              <option value="Computer Science">Computer Science</option> 
              <option value="Information Technology">Information Technology</option> 
              <option value="History">History</option> 
              <option value="Geography">Geography</option> 
              <option value="Civics">Civics</option> 
              <option value="Economics">Economics</option> 
              <option value="Business Studies">Business Studies</option> 
              <option value="Islamic Studies">Islamic Studies</option> 
              <option value="Art">Art</option> 
              <option value="Physical Education">Physical Education</option> 
            </select> 
          </div> 
          <div class="mb-3"> 
            <label for="price_per_hour" class="form-label">Price per Hour</label> 
            <input type="number" step="1" name="price_per_hour" class="form-control"> 
          </div> 
          <div class="mb-3"> 
            <label for="description" class="form-label">Description</label> 
            <textarea name="description" id="" cols="60" rows="auto"></textarea> 
          </div> 
          <div class="modal-footer"> 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
            <button type="submit" class="btn btn-success">Add Subject</button> 
          </div> 
        </form> 
      </div> 
    </div> 
  </div> 
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Subject</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="editSubjectForm" method="POST" action="{{ route('tutor.subject_update') }}">
          @csrf
          @method('PUT')

          <input type="hidden" name="subject_id" id="edit_subject_id">

          <div class="mb-3">
            <label for="edit_subject_name" class="form-label">Subject Name</label>
            <select name="name" id="edit_subject_name" class="form-control" required>
              <option value="" disabled>Select subject</option>
              <option value="Arabic">Arabic</option>
              <option value="English">English</option>
              <option value="Mathematics">Mathematics</option>
              <option value="Physics">Physics</option>
              <option value="Chemistry">Chemistry</option>
              <option value="Biology">Biology</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Information Technology">Information Technology</option>
              <option value="History">History</option>
              <option value="Geography">Geography</option>
              <option value="Civics">Civics</option>
              <option value="Economics">Economics</option>
              <option value="Business Studies">Business Studies</option>
              <option value="Islamic Studies">Islamic Studies</option>
              <option value="Art">Art</option>
              <option value="Physical Education">Physical Education</option>
            </select>
          </div>

      
          <div class="mb-3">
            <label for="edit_subject_price" class="form-label">Price per Hour</label>
            <input type="number" step="1" name="price_per_hour" id="edit_subject_price" class="form-control">
          </div>

    
          <div class="mb-3">
            <label for="edit_subject_description" class="form-label">Description</label>
            <textarea name="description" id="edit_subject_description" cols="60" rows="4" class="form-control"></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function openEditModal(subject) {
    document.getElementById('edit_subject_id').value = subject.id;
    document.getElementById('edit_subject_name').value = subject.name;
    document.getElementById('edit_subject_price').value = subject.pivot.price_per_hour ?? '';
    document.getElementById('edit_subject_description').value = subject.description ?? '';

    
    $('#editModal').modal('show');
}


document.querySelectorAll('.delete-subject-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); 
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); 
            }
        });
    });
});
</script>
@endsection

